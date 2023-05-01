<?php

use Core\Validator;
use Core\Database;
use Core\App;

        $email= $_POST['email'];
        $password=$_POST['password'];


        //validate the form

        $errors=[];
        
      if (!Validator::email($email)) {
        $errors['email']= 'please provide a valid email address';
      }

      if (! Validator::string($password,7,255)){
        $errors['password']= 'please provide a password of atleast seven characters';
      }

      if(! empty($errors)){
        return view('registration/create.view.php',[
            'errors' => $errors
        ]);
      }
        //check if user already exists 
        $db = App::resolve(Database::class);


        $user= $db->query('select * from users where email = :email',[
          'email'=>$email
          ])->find();


          if($user){
            //if yes redirect to log in page


            header('location: /');
            exit();
          }
          else

            //if not create one in the database and log the user in and redirect 
          $db->query('INSERT into users(email, password) VALUES(:email,:password)',[
            'email'=> $email,
            'password'=> $password
          ]);

          $_SESSION['user']=[
            'email' => $email
          ];

          header('location: /');
          exit();

             
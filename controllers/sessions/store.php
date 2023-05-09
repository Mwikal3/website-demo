<?php 
use Core\Validator;
use Core\Database;
use Core\App;

//log in user if credentials match 


$email= $_POST['email'];
$password=$_POST['password'];

$errors=[];

//validate the form


if (!Validator::email($email)) {
$errors['email']= 'please provide a valid email address';
}

if (! Validator::string($password)){
$errors['password']= 'please provide a valid password';
}

if(! empty($errors)){
    return view('sessions/create.view.php',[
        'errors' => $errors
    ]);
  }
  


//check if user already exists 

$user=$db->query('select * from users where email= :email',[
    'email' => $email
    ])->find();

//if user email does not exist return the error message

if(! $user){
    return view('sessions/create.view.php',[
        'errors' => [
            'email' =>'No matching user with that account found '
        ]
        ]);
}

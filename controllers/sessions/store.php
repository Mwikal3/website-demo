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
$db = App::resolve(Database::class);

$user=$db->query('select * from users where email= :email',[
    'email' => $email
    ])->find();

//if user email does not exist return the error message

if($user){

//check if the user password matches the one in the database 
if (password_verify($password, $user['password'])===$password){
//log in the user 
login($user);

redirect('/sessions/create.php'); //this is a function which redirects when conditions are not met 
//  header('location: /');
//      exit();
}
}

return view('sessions/create.view.php',[
    'errors' => [
        'email' =>'No matching user with that account and password found'
    ]
    ]);

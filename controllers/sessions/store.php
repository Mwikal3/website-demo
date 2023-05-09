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

//
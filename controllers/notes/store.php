<?php

//this controller persists submitting a new note to database


use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


// $config = require base_path('config.php'); //this requires a config file which contains db credentials
// $db = new Database($config['database']); //this creates a new database with info from config file  

$errors = [];

// dd(!Validator::string($_POST['body'], 1, 1000));

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}


if (!empty($errors)) {
    return  view("notes/create.view.php", [ //this connects to the html part
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}


$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 1
]);


header('location: /notes');
die();

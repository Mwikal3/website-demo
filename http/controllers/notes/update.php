<?php
// this controllers displays the form to create a note 

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);

// $config = require base_path('config.php'); //this requires a config file which contains db credentials
// $db = new Database($config['database']); //this creates a new database with info from config file  

$currentUserId = 1;

//find current note 

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail(); //queries the db and fetches notes with a particular id and aborts if not found 

//authorise that the user can edit the note

authorize($note['user_id'] === $currentUserId);

//validate the form

$errors=[];

if (!Validator::string($_POST['body'], 1, 1000)) {
   $errors['body'] = 'A body of no more than 1,000 characters is required';
}

//if no validation errors update the record in the notes database

if (count($errors)){
   return view('notes/edit.view.php',[
      'heading' => 'Edit Note',
      'errors' => $errors,
      'note' => $note

   ]);
}

$db->query('update notes set body = :body where id= :id',[
   'id' => $_POST['id'],
   'body' => $_POST['body']
]);

// redirect the user
header('location: /notes');
die();
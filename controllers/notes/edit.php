<?php
// this controllers displays the form to create a note 
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

// $config = require base_path('config.php'); //this requires a config file which contains db credentials
// $db = new Database($config['database']); //this creates a new database with info from config file  

$currentUserId = 1;


$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail(); //queries the db and fetches notes with a particular id and aborts if not found 

authorize($note['user_id'] === $currentUserId);

view("notes/edit.view.php", [ //this connects to the html part
   'heading' => 'Edit Note',
   'errors' => [],
   'note'=> $note
] );

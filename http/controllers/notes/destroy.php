<?php

use Core\Database;
use Core\App;

// $config = require base_path('config.php'); //this requires a config file which contains db credentials
// $db = new Database($config['database']); //this creates a new database with info from config file  
$db = App::resolve(Database::class);

$currentUserId = 1;

//form was submitted delete the current form
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail(); //queries the db and fetches notes with a particular id and aborts if not found 

authorize($note['user_id'] === $currentUserId); 

$db->query('delete from notes where id = :id',[
    'id' => $_POST['id']
]);

redirect('/notes');





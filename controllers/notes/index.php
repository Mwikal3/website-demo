<?php

use Core\App;
use Core\Database;



$db = App::resolve(Database::class); 

// $config = require base_path('config.php'); //this requires a config file which contains db credentials
// $db = new Database($config['database']); //this creates a new database with info from config file  

$notes = $db->query('select * from notes where user_id = 1')->get(); //queries the db and fetches relevant notes


// dd($notes);
//dumps all the notes fetches from db 

view("notes/index.view.php", [ //this connects to the html part
    'heading' => 'My notes',
    'notes' => $notes
]);

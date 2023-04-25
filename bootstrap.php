<?php

use Core\App;
use Core\container;
use Core\Database;

$container= new Container();

$container->bind('Core\Database', function(){
    $config = require base_path('config.php');   //this requires a config file which contains db credentials
    
    return new Database($config['database']);

});

// $db = $container->resolve('Core\Database');
App::setContainer($container);

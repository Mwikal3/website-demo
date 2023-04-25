 <?php

use Core\Database;

  const BASE_PATH = __DIR__ . '/../';

  require BASE_PATH . 'Core/functions.php';


  spl_autoload_register(function ($class) {
    //class= //core\database

    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path($class . '.php');
  });
  //  require base_path('Database.php'); //this links the index page to the database 
  //  require base_path('Response.php');
  $router= new \Core\Router();

  require base_path('bootstrap.php');

  $routes = require base_path('routes.php');//this includes the files in routes.php
  $uri = parse_url($_SERVER['REQUEST_URI']) ['path']; //parses url to current page that a user is using

  $method= $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; //checks if method is set and assigns that value to method else defaults to the other method

$router->route($uri, $method);
   


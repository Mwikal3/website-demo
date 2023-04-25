<?php

use Core\Response;

// use Core\Response;

   function dd($value)
   {
      echo "<pre>";
      var_dump($value);
      echo "</pre>";


      die();
   }
 
   function urlIs($value) {
      return $_SERVER['REQUEST_URI'] === $value;
   }

   function abort($code=404){
      http_response_code($code);  
            require "views/{$code}.php";
            die();
   }

   function authorize($condition, $status=Response::FORBIDDEN)
   {
      if (!$condition)
      {
         abort($status);
      }
   }

   function base_path($path) {
      return BASE_PATH . $path;
   }

   function view($path, $attributes=[])
   {
      extract($attributes);  //the extract function is used to accept an array and turn it into a set of variables

      require base_path('views/' . $path);
   }
?>
  
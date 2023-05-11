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

function urlIs($value)
{
   return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
   http_response_code($code);
   require "views/{$code}.php";
   die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
   if (!$condition) {
      abort($status);
   }
}

function base_path($path)
{
   return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
   extract($attributes);  //the extract function is used to accept an array and turn it into a set of variables

   require base_path('views/' . $path);
}

function login($user)
{
   $_SESSION['user'] = [
      'email' => $user['email']
   ];

   session_regenerate_id(true);
}
function redirect($path)
{
   header("Location: {$path}");
   exit();
}
function logout()
{

   $_SESSION = [];

   session_destroy();

   $params = session_get_cookie_params();

   setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

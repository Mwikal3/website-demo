<?php

// return[
//     '/' => '/index.php',
//     '/about' => '/about.php',
//     '/notes' => '/notes/index.php',
//     '/note' => '/notes/show.php',
//     '/notes/create'=> '/notes/create.php',
//     '/contact' => '/contact.php',
    
    
//   ]; 
$router->get('/', '/index.php');
$router->get('/about', '/about.php');
$router->get('/contact', '/contact.php');


$router->get('/notes', '/notes/index.php')->only('auth');
$router->get('/note', '/notes/show.php')->only('auth');
$router->delete('/note', '/notes/destroy.php')->only('auth');

$router->get('/note/edit', '/notes/edit.php')->only('auth');
$router->patch('/note', '/notes/update.php')->only('auth');

$router->get('/notes/create', '/notes/create.php')->only('auth');
$router->post('/notes', '/notes/store.php')->only('auth');

$router->get('/register', '/registration/create.php')->only('guest');
$router->post('/register', '/registration/store.php')->only('guest');

$router->get('/login', '/sessions/create.php')->only('guest') ;
$router->post('/login', '/sessions/store.php')->only('guest');
$router->delete('/logout', '/sessions/destroy.php')->only('auth');



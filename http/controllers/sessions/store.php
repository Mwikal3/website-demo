<?php

use Core\Authenticator;
use Http\LoginForm;

//log in user if credentials match 

$email = $_POST['email'];
$password = $_POST['password']; 

//validate the form

$form = new LoginForm();

if ($form->validate($email, $password)) {
    // return view('sessions/create.view.php', [
    //     'errors' => $form->errors()
    // ]);
    $auth = new Authenticator();

if ($auth->attempt($email, $password))//this calls function attempt which perfoms authorisation 
{
redirect('/');
}
else
{
    $form->error('email','No matching user with that account and password found');
}
}

session::flash($errors, $form->errors());  //this flashes the validation errors to the session 
//perfom a redirect 

return redirect('/login');

// return view('sessions/create.view.php', [
//             'errors' => [
//                 'email' => 'No matching user with that account and password found'
//             ]
//         ]);



















//authenticate the user 
// $auth = new Authenticator();

// if ($auth->attempt($email, $password))//this calls function attempt which perfoms authorisation 
// {
// redirect('/');
// }else
// {
//     return view('sessions/create.view.php', [
//         'errors' => [
//             'email' => 'No matching user with that account and password found'
//         ]
//     ]);
// } 



// $errors = [];
// if (!Validator::email($email)) {
//     $errors['email'] = 'please provide a valid email address';
// }

// if (!Validator::string($password)) {
//     $errors['password'] = 'please provide a valid password';
// }

// if (!empty($errors)) {
//     return view('sessions/create.view.php', [
//         'errors' => $errors
//     ]);
// }



//AUTHENTICATING THE USER


//check if user already exists 
// $db = App::resolve(Database::class);

// $user = $db->query('select * from users where email= :email', [
//     'email' => $email
// ])->find();

//if user email does not exist return the error message
// if ($user) {

//     //check if the user password matches the one in the database 
//     if (password_verify($password, $user['password'])) {
//         //log in the user 
//         login([
//             'email' => $email
//         ]);

    //     redirect('/');
    // } 
    // else {

        // return view('sessions/create.view.php', [
        //     'errors' => [
        //         'email' => 'No matching user with that account and password found'
        //     ]
        // ]);
//     }
// }

// login($user);

        // redirect('/'); //this is a function which redirects when conditions are not met 
        //  header('location: /');
        //      exit();
    // } else {
    //     return view('sessions/create.view.php', [
    //         'errors' => [
    //             'email' => 'Wrong credentials.'
    //         ]
    //     ]);
    // }
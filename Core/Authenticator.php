<?php 

namespace Core;
use Core\Database;

class Authenticator{

    public function attempt($email, $password)//this function attempts to log the user in if password and email is correct 
    {
        $user = App::resolve(Database::class)->query('select * from users where email= :email', [
            'email' => $email
        ])->find();

        if ($user) {
         //check if the user password matches the one in the database 
            if (password_verify($password, $user['password'])) {
                //log in the user 
                $this->login([
                    'email' => $email
                ]);
        
                return true ;
            }
        }
              return false;    
    }

    public function login($user)
{
   $_SESSION['user'] = [
      'email' => $user['email']
   ];

   session_regenerate_id(true);
}

public function logout()
{

   $_SESSION = [];

   session_destroy();

   $params = session_get_cookie_params();

   setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}


}
    
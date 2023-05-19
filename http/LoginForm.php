<?php

namespace Http;

use Core\Validator;


class LoginForm
{
    protected $errors = [];

    public function validate($email, $password)
    {

        if (!Validator::email($email)) {
            $this->errors['email'] = 'please provide a valid email address';
        }

        if (!Validator::string($password, 1, 5)) {
            $errors['password'] = 'please provide a valid password';
        }

        return  empty($this->errors);
    }

    public function errors()
    {
        return empty($this->errors);
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}

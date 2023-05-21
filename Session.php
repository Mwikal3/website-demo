<?php 


class session{

    public function has($key)
    {
        return (bool) static::get($key);
    }

    public static function put($key, $value)
    {
        $_SESSION[$key]= $value;
    }
    
    public static function get($key, $default= null){

        if(isset($_SESSION['_flash'][$key]))
        {
            return $_SESSION['flash'][$key];
        }

        return $_SESSION[$key] ?? $default;
    }

    public static function flash ($key, $value)
    {
        $_SESSION['_flashed'][$key] = $value;
    }

    public static function unflash($key, $value)
    {
        unset($_SESSION['_flashed']);
    }
}
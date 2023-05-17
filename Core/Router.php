<?php
namespace Core;

use Core\Middleware\Middleware;

class Router{

    protected $routes = [];

    public function add($method, $uri, $controller){
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller) 
    {
        return $this->add('GET', $uri, $controller);

    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);

    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);

    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);

    }
 
    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
        
    }
    public function only($key){

        $this->routes[array_key_last($this->routes)]['middleware']= $key;

        return $this;

    }

    public function route($uri, $method){
        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)){
                //apply middleware

                Middleware::resolve($route['middleware']);

                // if($route['middleware']){
                //         //apply the middleware
                //     $middleware = Middleware::MAP[$route['middleware']];
                //     (new $middleware)->handle;

                // }
          

                // if($route['middleware']==='guest'){
                //         (new Guest)->handle();
                //     // if($_SESSION['user'] ?? false){
                //     //    header ('location: /');
                //     //    exit();
                //     // }
                // }

                // if($route['middleware']==='auth'){
                //     (new Auth)->handle();
                //     // if(!$_SESSION['user'] ?? false){
                //     //    header ('location: /');
                //     //    exit();
                //     // }
                // }

                return require base_path('Http/controllers/'. $route['controller']);
            }
        }
        $this->abort();
    }

      protected function abort($code = 404)
           {
            http_response_code($code);  
            require "views/{$code}.php";
            die();
           }
}

// $routes = require base_path('routes.php');

// $uri = parse_url($_SERVER['REQUEST_URI']) ['path'];
 
//     function abort($code = 404)
//     {
//         http_response_code($code);  
//         require base_path("views/{$code}.php");
//         die();
//     }
        
//     routeToController($uri, $routes); 

//     function routeToController($uri, $routes){
//         if (array_key_exists($uri, $routes)){ //this function checks if array key exists and returns the value of the key  
//             require base_path($routes[$uri]);
//         }else {
//             abort();
//         }
//     }
           
    
    
        //    function abort($code = 404)
        //    {
        //     http_response_code($code);  
        //     require "views/{$code}.php";
        //     die();
        //    }
        //    }
    
     
    
    
    
       
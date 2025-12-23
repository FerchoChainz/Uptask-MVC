<?php  

namespace Controllers;

use MVC\Router;

class LoginController {

    public static function login(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }


        // render the view
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesion.'
        ]);
    }

    public static function logout(){

    }

    public static function create(Router $router){
        
        
        // render the view
        $router->render('auth/create', [
            'titulo' => 'Crea tu cuenta.'
        ]);
    }

    public static function forget(Router $router){

        $router->render('auth/forget',[
            'titulo' => "Olvide mi password"
        ]);
    }

    public static function recover(Router $router){

        $router->render('auth/recover',[
            'titulo' => 'Reestablece tu password'
        ]);
    }

    public static function message(Router $router){


        $router->render('auth/message',[
            'titulo'=> 'Mensaje'
        ]);
    }

    public static function confirm(Router $router){


        $router->render('auth/confirm',[
            'titulo' => 'Confirma tu cuenta'
        ]);
    }
}
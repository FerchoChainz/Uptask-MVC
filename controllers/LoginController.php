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

    public static function recover(){
        echo 'desde restablecer';
    }

    public static function message(){
        echo 'desde mensaje';
    }

    public static function confirm(){
        echo 'desde confirmar';
    }
}
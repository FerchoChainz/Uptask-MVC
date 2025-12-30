<?php  

namespace Controllers;

use Classes\Email;
use Model\User;
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
        $alerts = [];
        $user = new User;


        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user->sincronizar($_POST);
            $alerts = $user->validateNewAccount();


            if(empty($alerts)){
                // if user exist already

                $userExist = User::where('email',$user->email);
    
                if($userExist){
                    User::setAlerta('error','El usuario ya esta registrado');
    
                    $alerts = User::getAlertas();
                } else {
                    // Hash password
                    $user->hashPassword();

                    // delete second password
                    unset($user->password2);

                    // create token
                    $user->generateToken();
                    // create new user
                    $resultado = $user->guardar();

                    // send email 
                    $email = new Email($user->email, $user->name, $user->token);

                    $email->sendConfirmation();
                    

                    // debbuger($email);

                    if($resultado){
                        header('Location: /message');
                    }
                    
                }
            }

        }
        
        // render the view
        $router->render('auth/create', [
            'titulo' => 'Crea tu cuenta.',
            'user' => $user,
            'alerts' => $alerts
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
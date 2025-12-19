<?php  

namespace Controllers;

class LoginController {

    public static function login(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }
    }

    public static function logout(){

    }

    public static function create(){
        echo 'desde crear';
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
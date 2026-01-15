<?php

namespace Controllers;

use MVC\Router;

 class DashboardController {

    public static function index(Router $router){

        session_start();

        // protecting rout
        isAuth();

        $router->render('dashboard/index',[
            'titulo' => 'Dashboard'
        ]);
    }
 }
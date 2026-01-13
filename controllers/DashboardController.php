<?php

namespace Controllers;

use MVC\Router;

 class DashboardController {

    public static function index(Router $router){
        echo 'desde index';

        $router->render('',[]);
    }
 }
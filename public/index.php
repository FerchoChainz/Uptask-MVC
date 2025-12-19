<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
$router = new Router();

// LOGIN
$router->get('/',[LoginController::class,'login']);
$router->post('/',[LoginController::class,'login']);
$router->get('/logout',[LoginController::class,'login']);

// CREATE ACCOUNT
$router->get('/create',[LoginController::class, 'create']);
$router->post('/create',[LoginController::class, 'create']);

// FORGOT PASSWORD
$router->get('/forget',[LoginController::class, 'forget']);
$router->post('/forget',[LoginController::class, 'forget']);

// RECOVER PASSWORD
$router->get('/recover',[LoginController::class, 'recover']);
$router->post('/recover',[LoginController::class, 'recover']);

// CONFIRM ACCOUNT
$router->get('/message',[LoginController::class, 'message']);
$router->get('/confirm',[LoginController::class, 'confirm']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
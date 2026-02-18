<?php

namespace Controllers;

use Model\Project;
use MVC\Router;

 class DashboardController {

    public static function index(Router $router){

        session_start();

        // protecting rout
        isAuth();

        // get te id of the session
        $id = $_SESSION['id'];

        // projects to belong to an ID
        $projects = Project::belongsTo('ownerid',$id);


        $router->render('dashboard/index',[
            'titulo' => 'Proyectos',
            'projects' => $projects
        ]);
    }

    public static function create_project(Router $router){
        session_start();

        // Protect the route checking if the user is auth
        isAuth();
        $alerts = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $project = new Project($_POST);


            $alerts = $project->validateProject();

            // Check if theres not alerts remain
            if(empty($alerts)){
                // generate unique url
                $hash = md5(uniqid());
                $project->url = $hash;

                // Save the project creator
                $project->ownerid = $_SESSION['id']; 

                // Save the data into DB
                $project->guardar();

                // Redirect once the data is saved correctly 
                header('Location: /project?url=' . $project->url);
            }
        }

        $router->render('dashboard/create_project',[
            'titulo' => 'Crear Proyecto',
            'alerts' => $alerts
        ]);
    }

    public static function project(Router $router){

        session_start();
        isAuth();

        $token = $_GET['url'];
        if(!$token){
            header('Location: /dashboard');
        }

        // Check if the user own the project
        $project = Project::where('url', $token);

        // if the project owner is different of session id, redirect
        if($project->ownerid !== $_SESSION['id']){
            header('Location: /dashboard');
        }


        $router->render('dashboard/project',[
            'titulo' => $project->project
        ]);
    }


    public static function profile(Router $router){
        session_start();

        $router->render('dashboard/profile',[
            'titulo' => 'Perfil'
        ]);
    }
 }
<?php  
    namespace Controllers;

use Model\Project;
use Model\Task;

    class TaskController{

    public static function index(){
        
    }
    public static function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            session_start();

            $projectId = $_POST['projectId'];
    
            $project = Project::where('url',$projectId);

            if(!$project || $project->ownerid !== $_SESSION['id']){
                $response = [
                    'type' =>'error',
                    'message' => 'Hubo un error al crear la tarea'
                ];
                echo json_encode($response);
                return;

            } 

            // create instance and the task
            $task = new Task($_POST);

            // asign the project id 
            $task->projectId = $project->id;
            $result = $task->guardar();
            $response =[
                'type' => 'succes',
                'id' => $result['id'],
                'message' => 'Tarea creada correctamente'
            ];
            echo json_encode($response);

        }
    }

    public static function update(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }
    }

    public static function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }
    }


    }

?>
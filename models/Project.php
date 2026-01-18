<?php  

namespace Model;

class Project extends ActiveRecord{
    protected static $tabla = 'projects';
    protected static $columnasDB = ['id', 'project', 'url', 'ownerid'];

    public $id;
    public $project;
    public $url;
    public $ownerid;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->project = $args['project'] ?? '';
        $this->url = $args['url']?? '';
        $this->ownerid = $args['ownerid'] ?? '';
        
    }

    public function validateProject(){
        if(!$this->project){
            self::$alertas['error'][] = "El nombre del proyecto no puede ir vacio";
        }

        return self::$alertas;
    }
}
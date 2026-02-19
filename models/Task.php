<?php  
    namespace Model;

    class Task extends ActiveRecord{

    protected static $tabla = 'tasks';
    protected static $columnasDB = ['id','name', 'status', 'projectId'];


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->status = $args['status'] ?? 0;
        $this->projectId = $args['projectId'] ?? '';

    }

    }

?>
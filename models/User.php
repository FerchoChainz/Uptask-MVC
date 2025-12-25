<?php  

namespace Model;

class User extends ActiveRecord{

    protected static $tabla = 'users';
    protected static $columnasDB = ['id','name','email','password', 'token', 'confirmed'];

    public $id;
    public $name;
    public $email;
    public $password;
    public $password2;
    public $token;
    public $confirmed;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmed = $args['confirmed'] ?? 0;
    }


    // Validate new accoutns
    public function validateNewAccount(){
        if(!$this->name){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El password no puede ir vacio';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El password debe tener minimo 6 caracteres';
        }

        // if two factor password auth is different 
        if($this->password !== $this->password2){
            self::$alertas['error'][] = 'Los passwords son diferentes';
        }

        return self::$alertas;
    }


    // hash password
    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }


    // generate token
    public function generateToken(){
        $this->token = uniqid();
    }
}
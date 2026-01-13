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


    // validate Login
    public function validateLogin(){
        if(!$this->email){
            self::$alertas['error'][] = "El email no puede ir vacio";
        }

        if(filter_var(!$this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertas['error'][] = "El formato de email no es valido";
        }

        if(!$this->password){
            self::$alertas['error'][] = "El password no puede ir vacio";
        }

        return self::$alertas;
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

    public function validateEmail(){
        if(!$this->email){
            self::$alertas['error'][] = 'El campo email es obligatorio';
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertas['error'][] = 'Formato incorrecto de email';
        }

        return self::$alertas;
    }


    public function validateNewPassword(){
        if(empty($this->password)){
            self::$alertas['error'][] = 'El campo no puede ir vacio';
        }

        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El password debe tener al menos 6 caracteres';
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
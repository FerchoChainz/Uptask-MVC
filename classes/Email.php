<?php  

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $name;
    public $token;

    public function __construct($email, $name, $token){
        $this->email = $email;
        $this->name = $name;
        $this->token = $token;
    }

    public function sendConfirmation(){
        // create email object
        $email = new PHPMailer();


        // Config SMTP 
        $email->isSMTP();
        $email->Host = $_ENV['EMAIL_HOST'];
        $email->SMTPAuth = true;
        $email->Port = $_ENV['EMAIL_PORT'];
        $email->Username = $_ENV['EMAIL_USER'];
        $email->Password = $_ENV['EMAIL_PSWD'];
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $email->setFrom('test@demomailtrap.co', 'Uptask');
        $email->addAddress('a21110132@ceti.mx', 'Uptask.com');
        $email->Subject = 'Confirma tu cuenta';

        $email->isHTML(true);
        $email->CharSet = 'UTF-8';


        // Define content
        $content = '<HTML>';
        $content .= '<p><strong>Hola' . $this->name . '</strong> Has creado tu cuenta en Uptask. Confirma tu cuenta dando click en el siguiente enlance.</p>';

    }

}
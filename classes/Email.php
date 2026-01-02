<?php  

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    protected $email;
    protected $name;
    protected $token;

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
        $email->Host = 'sandbox.smtp.mailtrap.io';
        $email->SMTPAuth = true;
        $email->Port = 2525;
        $email->Username = '906bcff8ae7a14';
        $email->Password = '5ec78622c1908f';
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $email->setFrom('test@demomailtrap.co', 'Uptask');
        $email->addAddress('cuentas@uptask.com', 'Uptask.com');
        $email->Subject = 'Confirma tu cuenta';

        $email->isHTML(true);
        $email->CharSet = 'UTF-8';


        // Define content
        $content = '<HTML>';
        $content .= '<p><strong>Hola, ' . $this->name . '</strong> Has creado tu cuenta en Uptask. Confirma tu cuenta dando click en el siguiente enlance.</p>';
        $content .= "<p>Presiona aqui <a href='http://localhost:3000/confirm?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $content .= "<p>Si no creaste esta cuenta, ignora este mensaje.</p>";
        $content .= '</html>';

        $email->Body = $content;

        $email->send();

    }

    public function sendInstructions(){

        $email = new PHPMailer();

        // Config SMTP 
        $email->isSMTP();
        $email->Host = 'sandbox.smtp.mailtrap.io';
        $email->SMTPAuth = true;
        $email->Port = 2525;
        $email->Username = '906bcff8ae7a14';
        $email->Password = '5ec78622c1908f';
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $email->setFrom('test@demomailtrap.co', 'Uptask');
        $email->addAddress('cuentas@uptask.com', 'Uptask.com');
        $email->Subject = 'Reestablece tu password';

        $email->isHTML(true);
        $email->CharSet = 'UTF-8';

        // define body content email
        $content = '<html>';
        $content .= '<p>Hola,<strong> '. $this->name .'. </strong>Has solicitado reestablecer tu contraseña. Da click en el siguiente enlace para hacerlo</p>';
        $content .= "<p>Presiona aqui <a href='http://localhost:3000/recover?token=" . $this->token . "'>Restablece tu password</a></p>";
        $content .= "<p>Si tu no solicitaste esta cuenta, ignora el mensaje.</p>";
        $content .= "</html>";

        $email->Body = $content;

        // send email
        $email->send();

    }



}
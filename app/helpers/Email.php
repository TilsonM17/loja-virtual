<?php


namespace App\helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email
{

    /**
     * @var object de envio de Email
     */
    private $mailer;


    public function __construct($mailer)
    {
        $this->mailer =  $mailer;
    }
    public function EnviarEmail(array $_)
    {

        try {

            #Validar o formato do email
            if (!Func::validarEmail($_['email'])) {
                return false;
            }
            $rota = Func::urlReturrn('validar_email_submit');
            $rota .= "/{$_['purl']}";
            //Server settings
            $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->mailer->isSMTP();                                            //Send using SMTP
            $this->mailer->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
            $this->mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mailer->Username   = EMAIL_USER_NAME;                     //SMTP username
            $this->mailer->Password   = EMAIL_PASS;                               //SMTP password
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $this->mailer->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $this->mailer->setFrom(EMAIL_USER_NAME, APP_NAME . "::Livros de Qualidade"); # Add emissor e o seu nome
            $this->mailer->addAddress($_['email'], $_['nome']);     //Add a reptor e o seu nome
            //Content
            $this->mailer->isHTML(true);                                  //Set email format to HTML
            $this->mailer->Subject = 'Confirmar o seu email'; # Titulo
            $body = "Ola {$_['nome']} tudo bem?.<br> O seu email foi usado em nossa plataforma,se não foi voçe a usar,ignore este email.<br>";
            $body .= "Caso contario clique no Link abaixo: <br> <hr> <a href=" . $rota . ">Validar Conta</a>";
            $body .= "<hr>";
            $body .= APP_NAME . ":: Livros de Qualidade";

            $this->mailer->Body = $body; #Mensagem

            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return $e->errorMessage();
        }
    }
}

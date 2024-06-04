<?php

namespace Helpers;

use Libraries\PHPMailer\PHPMailer;
use Libraries\PHPMailer\SMTP;
use Libraries\PHPMailer\Exception;

class Mailable
{
    private $mail;
    private static $instance;

    protected function __construct($userSend) {
        $this->mail = new PHPMailer(true);
    
        //Server settings
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mail->isSMTP();
        $this->mail->Host       = hostSMTP;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = userSMTP;
        $this->mail->Password   = passwordSMTP;
        //$this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port       = portSMTP;
        $this->mail->CharSet = 'UTF-8';
        
        //Recipients
        $this->mail->setFrom($userSend ?? fromUser, mailName);
        $this->mail->AltBody = '';
        $this->mail->isHTML(true);

        return $this;
    }

    public static function to($email, $from = null){
        if(self::$instance == null){
            self::$instance = new Mailable($from);
        }

        self::$instance->mail->addAddress($email, '');
        return self::$instance;
    }

    public function subject($subject){
        $this->mail->Subject = $subject;
        return $this;
    }

    public function send($content)
    {
        try {
            $this->mail->Body = $content;
            $this->mail->send();

            return true;
        } catch (Exception $e) {
        }

        return false;
    }
}

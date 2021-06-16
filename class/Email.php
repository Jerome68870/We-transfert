<?php 

declare(strict_types=1);

namespace App;

use App\ConstEmail;

class Email 
{
    private \Swift_SmtpTransport $transport;
    private \Swift_Mailer $mailer;
    private \Swift_Message $message;

    function __construct()
    {
        $this->setTransport();
        $this->setMailer();
    }

    private function setTransport()
    {
        $this->transport = (new \Swift_SmtpTransport(ConstEmail::$EMAIL_HOST, ConstEmail::$EMAIL_PORT))
        ->setUsername(ConstEmail::$EMAIL_USERNAME)
        ->setPassword(ConstEmail::$EMAIL_PASSWORD)
        ->setEncryption(ConstEmail::$EMAIL_ENCRYPTION);
    }

    function getTransport(): \Swift_SmtpTransport
    {
        return $this->transport;
    }

    function setMailer()
    {
        $this->mailer = new \Swift_Mailer($this->getTransport());
    }

    function getMailer(): \Swift_Mailer
    {
        return $this->mailer;
    }
    
    public function setMessage(string $subject, string $mailExpediteur, string $mailDestinataire, string $body)
    {
        $this->message = (new \Swift_Message($subject))
        ->setFrom($mailExpediteur)
        ->setTo($mailDestinataire)
        ->setBody($body, 'text/html')
        ;
    }

    public function send(): int
    {
        return $this->getMailer()->send($this->message); 
    }

    function isValidEmail($email)
    {
        $regex = preg_match("/^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$/", $email);

        if($regex) 
        {
            return true;
        } else 
        {
            return false;
        }
    }
}



?>
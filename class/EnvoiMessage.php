<?php 

declare(strict_types=1);

namespace App;

use App\Email;

class EnvoiMessage 
{

    function __construct( private string $subject, private string $body){}

    function Execute ()
    {
        if(isset($_POST))
        {   
            $email = new Email();
             
            if ($email->isValidEmail($_POST['mailExpediteur']) && $email->isValidEmail($_POST['mailDestinataire'])) 
            {
        
                $email->setMessage($this->subject,$_POST['mailExpediteur'],$_POST['mailDestinataire'],$this->body);
            
                $email->send();
                            
            }  
         
        }
        
    } 
}

?>
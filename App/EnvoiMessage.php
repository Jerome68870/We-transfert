<?php 

declare(strict_types=1);

require 'Mail.php';

$msg = '';
$subject = 'Transfert de fichiers avec Swift Mailer';
$message = new Swift_Message($subject);
$body = '<!DOCTYPE html>
<html lang="fr">
<head>
   <title>Transfert de fichiers</title>
</head>
<body>
    <h1>Fichier Transferer</h1>

</body>
</html>';

if(isset($_POST))
{
    // Create the Transport
    
    $transport = (new Swift_SmtpTransport(EMAIL_HOST, EMAIL_PORT))
    ->setUsername(EMAIL_USERNAME)
    ->setPassword(EMAIL_PASSWORD)
    ->setEncryption(EMAIL_ENCRYPTION);
    
    // Create the Mailer using your created Transport
    
    $mailer = new Swift_Mailer($transport);
    
    // Create a message

    // dump($_FILES['fichier']);
  
    $message = (new Swift_Message($subject))
    ->setFrom($_POST['mailExpediteur'])
    ->setTo($_POST['mailDestinataire'])
    ->setBody($body, 'text/html');

    $number = count($_FILES['fichier']['name']);
        
    for ($i=0; $i<$number; $i++) {
        
        $name = $_FILES ['fichier']['name'][$i];
        $tmp_name = $_FILES ['fichier']['tmp_name'][$i];

        $message->attach(Swift_Attachment::fromPath ($tmp_name)
                ->setFilename($name));

    }
                // ->attach(Swift_Attachment::fromPath ($_FILES['fichier']['tmp_name'][1])
                //     ->setFilename($_FILES['fichier']['name'][1]))
                // ->attach(Swift_Attachment::fromPath ($_FILES['fichier']['tmp_name'][2])
                //     ->setFilename($_FILES['fichier']['name'][2]));

    
    // Send the message
    
    $result = $mailer->send($message);
    
    if(!$result)
    {
        $msg = '<div class="alert alert-danger text-center">
                Oups il y a une merde dans la potage !!!!
                </div>';
    } else {
        $msg = '<div class="alert alert-success text-center">
                Message envoye avec succès !!!!
                </div>';

    }
}

?>
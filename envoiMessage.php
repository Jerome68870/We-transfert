<?php 

declare(strict_types=1);

require 'email.php';

$msg = '';
$subject = 'Transfert de fichiers avec Swift Mailer';
$message = new Swift_Message($subject);
$body = '<!DOCTYPE html>
<html lang="fr">
<head>
   <title>Transfert de fichiers</title>
</head>
<body>
    <h1>Cliquer pour demarrer le téléchargement</h1>
    <p>
    <a href="http://localhost:8080/download.php?ref='.$dossier.'" class="btn btn-info">Téléchager</a>
    </p>
</body>
</html>';

dump($dossier);

if(isset($_POST))
{   
    $transport = (new Swift_SmtpTransport(EMAIL_HOST, EMAIL_PORT))
    ->setUsername(EMAIL_USERNAME)
    ->setPassword(EMAIL_PASSWORD)
    ->setEncryption(EMAIL_ENCRYPTION);
    
    $mailer = new Swift_Mailer($transport);
    
    $message = (new Swift_Message($subject))
    ->setFrom($_POST['mailExpediteur'])
    ->setTo($_POST['mailDestinataire'])
    ->setBody($body, 'text/html');

    $number = count($_FILES['fichier']['name']);
        
    for ($i=0; $i<$number; $i++) {
        
        $name = $_FILES ['fichier']['name'][$i];
        $tmp_name = $_FILES ['fichier']['tmp_name'][$i];

    }
    
    $result = $mailer->send($message);

}

?>
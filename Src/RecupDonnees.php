<?php 

declare(strict_types=1);

use App\EnvoiMessage;

require '../vendor/autoload.php';

$messages = [];


$dossier = uniqid('def',true );

mkdir("../Public/Upload/".$dossier, 0700);

if(isset($_FILES['fichier']))
{ 
    
    
    $numbre = count($_FILES['fichier']['name']);
    
    for ($i=0; $i<$numbre; $i++) {
        
        $name = $_FILES ['fichier']['name'][$i];
        $tmp_name = $_FILES ['fichier']['tmp_name'][$i];
        $messages[] = upload($dossier,$name,$tmp_name);
        
    }
}

function upload($dossier,$name,$tmp_name) 
{
    $cheminDeDestination = "../Public/Upload/".$dossier ."/".$name;
    
    $cheminTemporaire = $tmp_name;
    
    if(move_uploaded_file($cheminTemporaire,$cheminDeDestination))
    {
        return 'Le fichier "'.$name.'" a été correctement uploadé';
        
    } else {
        return 'Le fichier "'.$name.'" n\'a pas été correctement uploadé';  
    } 
    
}

$msg = '';
$subject = 'Transfert de fichiers avec Swift Mailer';

$body = '<!DOCTYPE html>
<html lang="fr">
<head>
<title>Transfert de fichiers</title>
</head>
<body>
<h1>Cliquer pour demarrer le téléchargement</h1>
<p>
<a href="http://localhost:8080/Src/ChargementFichier.php?ref='.$dossier.'" class="btn btn-info">Téléchager</a>
</p>
</body>
</html>';

$envoiMessage = new EnvoiMessage($subject,$body);
$envoiMessage->Execute();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Css/StyleRecupDonnees.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <title>Upload de fichiers</title>
</head>
<body>
    <h1>Transfert de fichiers</h1> 
        <div id='carte'>
            <h2>Upload de fichiers</h2>
        
            <ul>
        
                <?php foreach ($messages as $message): ?>
        
                    <li><?= $message ?></li>
        
            <?php endforeach;?>
        
            </ul>
            
        </div>
        <div id='message'> 
             <?= $msg; ?> 
        </div>
        
</body>
</html>
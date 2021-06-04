<?php 

declare(strict_types=1);

require '../vendor/autoload.php';
require 'EnvoiMessage.php';

// dump($_POST);
$messages = [];

if(isset($_FILES['fichier']))
{ 
    
    
    $numbre = count($_FILES['fichier']['name']);
    
    for ($i=0; $i<$numbre; $i++) {
        
        $name = $_FILES ['fichier']['name'][$i];
        $tmp_name = $_FILES ['fichier']['tmp_name'][$i];
        $messages[] = upload($name,$tmp_name);
        
    }
}
dump($_FILES['fichier']);

// dump($messages);

function upload($name,$tmp_name) 
{
    $cheminDeDestination = '../Upload/'.$name;
    
    $cheminTemporaire = $tmp_name;
    
    if(move_uploaded_file($cheminTemporaire,$cheminDeDestination))
    {
        return 'Le fichier "'.$name.'" a été correctement uploadé';
        
    } else {
        return 'Le fichier "'.$name.'" n\'a été correctement uploadé';  
    } 
    
}


// dump($msg);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styleRecupDonnees.css">
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
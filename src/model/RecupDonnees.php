<?php 

declare(strict_types=1);

namespace App\model;

require '../vendor/autoload.php';

use App\classe\EnvoiMessage;
use App\model\PageRecupDonnees;

Class RecupDonnees {

    Private $msg = '';
    Private $subject = 'Transfert de fichiers avec Swift Mailer';
    Private $body = '<!DOCTYPE html>
    <html lang="fr">
    <head>
    <title>Transfert de fichiers</title>
    </head>
    <body>
    <h1>Cliquer pour demarrer le téléchargement</h1>
    <p>
    <a href="http://localhost:8080/ChargementFichier?ref=$dossier" class="btn btn-info">Télécharger</a>
    </p>
    </body>
    </html>';
    
    function RecupDonnees()
    {    
        $messages = [];
        
        $dossier = uniqid('def',true );

        $this->body = str_replace('$dossier', $dossier , $this->body);
        
        mkdir("../Upload/".$dossier, 0700);
        
        if(isset($_FILES['fichier']))
        { 
            $numbre = count($_FILES['fichier']['name']);
            
            for ($i=0; $i<$numbre; $i++) {
                
                $name = $_FILES ['fichier']['name'][$i];
                $tmp_name = $_FILES ['fichier']['tmp_name'][$i];
                $messages[] = $this->upload($dossier,$name,$tmp_name);
                
            }
        }

        $envoiMessage = new EnvoiMessage($this->subject,$this->body);
        $envoiMessage->Execute();
        
        $pageRecupDonnees = new PageRecupDonnees();
        $pageRecupDonnees->affichageRecupDonnees($messages,$this->msg);
    }

    function upload($dossier,$name,$tmp_name) 
    {
        $cheminDeDestination = "../upload/".$dossier ."/".$name;
        
        $cheminTemporaire = $tmp_name;
        
        if(move_uploaded_file($cheminTemporaire,$cheminDeDestination))
        {
            return 'Le fichier "'.$name.'" a été correctement uploadé';
            
        } else {
            return 'Le fichier "'.$name.'" n\'a pas été correctement uploadé';  
        } 
        
    }

}
?>


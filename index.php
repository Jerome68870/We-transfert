<?php 

declare(strict_types=1);

require 'vendor/autoload.php';
// require 'App/EnvoiMessage.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="validationMail.js" defer></script>
    <link rel="stylesheet" href="style.css">
    <title>Formulaire</title>
</head>
    <body>

        <h1>Transfert de fichiers</h1> 
    
            <form method="POST" action="App/RecupDonnees.php" enctype="multipart/form-data">
                <div class="one"> Votre adresse e-mail: </div>
                <div class="two">
                    <input type="email" id="mailExpediteur" name="mailExpediteur" required="required" aria-required="true" 
                    pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" type="text" spellcheck="false" >
                </div>
                <div class="three">Envoyer à:</div>
                <div class="four">
                    <input type="email" id="mailDestinataire" name="mailDestinataire" required="required" aria-required="true" 
                    pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" type="text" spellcheck="false" >
                </div>
                <div class="five">
                    <input type="file" name="fichier[]" value="" multiple >
                </div>
                <div class="six">
                    <input type="submit" name="chargement" value="Enregistrer">
                </div>
                
            </form> 

    </body>
</html>


<?php

namespace App\model;

class PageAccueil 
{    
    function affichage ()
    {
        ?>
    <!DOCTYPE html>   
    <html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/Validation.js" defer></script>
    <script type="text/javascript" src="js/RéinitialisationForm.js" defer></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Style.css">
    <title>Formulaire</title>
    </head>
        <body> 
            <h1>Transfert de fichiers</h1> 
        
                <form method="POST" id="formulaire" action="RecupDonnees" enctype="multipart/form-data">
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
                        <input type="file" id="fichiers" name="fichier[]" multiple>
                    </div>
                    <div class="six">
                        <input id="enregistrer" type="submit" name="chargement" value="Transférer">
                        <button id="vider" >Réinitialiser</button>
                    </div>
                </form> 
                
                <div id='message'> 
                    
                </div>
        </body>
    </html>

    <?php

    }
}

?>
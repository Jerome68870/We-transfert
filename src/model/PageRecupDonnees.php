<?php 

namespace App\model;

class PageRecupDonnees
{
    function affichageRecupDonnees($messages,$msg)
    {
        ?>

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/StyleRecupDonnees.css">
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
        <?php 

    } 
}
?>
<?php

require '../vendor/autoload.php';

$name = $_GET['ref'];
$directory = '../Public/Upload/'.$name;


$files = scandir($directory);

$nb_fichier = 0;

echo '<ul>';

if($dossier = opendir($directory ))
{
    while(false !== ($fichier = readdir($dossier)))
    {
        if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
        {
            $nb_fichier++;
            $chemin = $directory.'/'. $fichier;
            echo'<li><a href="http://localhost:8080/Class/TelechargementFichier.php?ref='.$chemin.'"a>'.$fichier.'</a></li>';
            echo '<br>'.$chemin;
        } 
        
    }
    echo '</ul><br />';
    echo 'Il y a <strong>' . $nb_fichier .'</strong> fichier(s) dans le dossier';
    
    closedir($dossier);
    
}     
else
{
    echo 'Le dossier n\' a pas pu être ouvert';
}

?>
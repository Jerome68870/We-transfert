<?php

namespace App\model;

require '../vendor/autoload.php';

Class ChargementFichier {

    Private $directory ;
    Private $nb_fichier = 0;
    
    function __construct($name)
    {
        $this->directory = '../upload/'.$name;
    }
    
    function Chargement()
    {
        
        echo '<ul>';
        
        if($dossier = opendir($this->directory ))
        {
            while(false !== ($fichier = readdir($dossier)))
            {
                if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
                {
                    $this->nb_fichier++;
                    $chemin = $this->directory.'/'. $fichier;
                    echo'<li><a href="http://localhost:8080/TelechargementFichier?ref='.$chemin.'"a>'.$fichier.'</a></li>';
                } 
                
            }
            echo '</ul><br />';
            echo 'Il y a <strong>' . $this->nb_fichier .'</strong> fichier(s) dans le dossier';
            
            closedir($dossier);     
        }     
        else
        {
            echo 'Le dossier n\' a pas pu être ouvert';
        }
    }    
}

?>
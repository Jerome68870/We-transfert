<?php 

declare(strict_types=1);

require '../vendor/autoload.php';

use App\classe\TelechargementFichier;
use App\model\PageAccueil;
use App\model\RecupDonnees;
use App\model\ChargementFichier;


$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];


$pathInfo= '';
if(isset($_SERVER['PATH_INFO']))
{
    $pathInfo=$_SERVER['PATH_INFO'];
}


if($uri == '/' && $method == 'GET')
{
    $pageAccueil = new PageAccueil();
    $pageAccueil->affichage();
}


if($uri == '/RecupDonnees' && $method == 'POST')
{
    $recupDonnees = new RecupDonnees();
    $recupDonnees->RecupDonnees();
}


if($pathInfo == '/ChargementFichier' && $method == 'GET')
{
    $nomRepertoire = $_GET['ref'];
    $chargementFichier = new ChargementFichier($nomRepertoire);
    $chargementFichier->Chargement();
}

if($pathInfo == '/TelechargementFichier' && $method == 'GET')
{
    $filePath = $_GET['ref'];
    $telechargementFichier = new TelechargementFichier($filePath);
    $telechargementFichier->Telechargement();
}

?>




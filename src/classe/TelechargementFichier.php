<?php 

declare(strict_types=1);

namespace App\classe;

class TelechargementFichier {

    private $fileName;

    public function __construct($filePath)
    {
        $this->fileName = basename($filePath);
        $this->filePath = $filePath;
    }

    function Telechargement ()
    {
        
        header("Content-Description: File Transfer");
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"".$this->fileName. "\"");
        readfile ($this->filePath);   

    }
}

?>
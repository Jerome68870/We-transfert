<?php 


header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"".basename($_GET['ref']). "\"");
readfile ($_GET['ref']);   


?>
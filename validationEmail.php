<?php 

$regex = preg_match("^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$", $email);

dd($regex);

function isValidEmail($email)
{
   if($regex) 
   {
       return true;
   } else 
   {
       return false;
   }
}

?>
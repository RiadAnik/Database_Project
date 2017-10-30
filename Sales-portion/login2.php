<?php

require_once 'connect.inc.php';
require_once 'core.inc.php';
$abc="Homepage.php";

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

     //$_SESSION['loggedin']="loggedin";
         //header('Location:repaircustomer.php');
 header('Location: '.$abc);
     
}


?>
    
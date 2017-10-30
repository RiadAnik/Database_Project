<?php
require_once 'connect.php';
ob_start();
session_start();
?>
<?php

if(isset($_POST['c_fn'])&&isset($_POST['c_ln'])&&isset($_POST['c_m'])&&isset($_POST['c_p']))
{
    
    $c_fn=mysql_real_escape_string($_POST['c_fn']);
    $c_ln=mysql_real_escape_string($_POST['c_ln']);
    $c_m=mysql_real_escape_string($_POST['c_m']);
    $c_p=mysql_real_escape_string($_POST['c_p']);
    //$c_d=mysql_real_escape_string($_POST['c_d']);
  
if(!empty($c_fn)&&!empty($c_ln)&&!empty($c_m)&&!empty($c_p))
{
$query="SELECT project.`customer`.`C_Fname`,`C_Lname`,`C_phone`,`C_email`,`D_id` FROM project.`customer` WHERE project.`customer`.`C_Fname`='$c_fn' AND project.`customer`.`C_Lname`='$c_ln' AND  project.`customer`.`C_phone`='$c_p' AND  project.`customer`.`C_email`='$c_m' AND  project.`customer`.`D_id`='2'";
    $query_run=mysql_query($query); 
if(mysql_num_rows($query_run)==1)
{
            $_SESSION['duality']="duality";
         header('Location: repaircustomer.php');
}

else {
$query=" INSERT INTO project.`customer` VALUES(NULL,'$c_fn', '$c_ln','$c_p','$c_m','2') ";
    if( $query_run=mysql_query($query)){
              $_SESSION['added']="added";
         header('Location:repaircustomer.php');
    }
    else{
            $_SESSION['nodata']="nodata";
         header('Location: repaircustomer.php');
}   
}
}
    else{
              $_SESSION['fill']="fill";
         header('Location: repaircustomer.php');
    }
}
?>
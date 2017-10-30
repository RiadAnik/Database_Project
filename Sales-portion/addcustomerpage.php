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
   

  
  
if(!empty($c_fn)&&!empty($c_ln)&&!empty($c_m)&&!empty($c_p))
{
$query="SELECT project.`customer`.`C_Fname`,`C_Lname` FROM project.`customer` WHERE project.`customer`.`C_Fname`='$c_fn' AND project.`customer`.`C_Lname`='$c_ln' ";
    $query_run=mysql_query($query); 
if(mysql_num_rows($query_run)>=1)
{
            $_SESSION['duality']="duality";
         header('Location: addCustomer.php');
}

else {
$query=" INSERT INTO project.`customer` VALUES(NULL,'$c_fn', '$c_ln','$c_p','$c_m','1') ";
    if( $query_run=mysql_query($query)){
              $_SESSION['added']="added";
         header('Location: addCustomer.php');
    }
    else{
            $_SESSION['nodata']="nodata";
         header('Location: addCustomer.php');
}   
}
}
    else{
              $_SESSION['fill']="fill";
         header('Location: addCustomer.php');
    }
}
?>
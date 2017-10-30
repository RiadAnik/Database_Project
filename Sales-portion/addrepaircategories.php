<?php
require_once 'connect.php';
ob_start();
session_start();
?>
                <?php

if(isset($_POST['s_n'])&&isset($_POST['s_p']))
{
    
    $sname=mysql_real_escape_string($_POST['s_n']);
    $sprice=mysql_real_escape_string($_POST['s_p']);
if(!empty($sname)&&!empty($sprice))
{
    
  

$query="SELECT project.`product`.`P_name` FROM project.`product` WHERE project.`product`.`P_name`='$sname' ";
$query_run=mysql_query($query); 
if(mysql_num_rows($query_run)>=1)
{
       $_SESSION['Duality']="Duality";
            header('Location: raddepairservices.php');
}

else {
$query=" INSERT INTO project.`product` VALUES(NULL,'$sname', '23','0','$sprice','null','2','null') ";
    if( $query_run=mysql_query($query)){
          $_SESSION['insert']="insert";
            header('Location:  addrepairservices.php');
    }
    else{
            $_SESSION['Sorry']="Sorry";
            header('Location:  addrepairservices.php');
}
}
}
    else{
            $_SESSION['fill']="fill";
            header('Location:  addrepairservices.php');
    }
}
?>

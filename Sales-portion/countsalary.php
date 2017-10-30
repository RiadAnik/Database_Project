<?php
require_once 'connect.php';
ob_start();
session_start();
?>
  <?php

if(isset($_POST['s_date'])&&!empty($_POST['s_date']))
{
    $pcat=mysql_real_escape_string($_POST['s_date']);
    $_SESSION['pcat']=$pcat;
    header('Location: SalesSection.php');
    $query=mysql_query("SELECT project.`order`.`O_price` FROM project.`order` WHERE project.`order`.`O_date`='$pcat' AND project.`order`.`D_id`='1'");
     $t=0;
     while ($row=mysql_fetch_array($query,MYSQL_NUM)){
    $t=$t+$row[0];
    }
     if($t==0)
    {
          $_SESSION['none']="none";
    header('Location: SalesSection.php');
    }
    else{
     $_SESSION['t']=$t;
    header('Location: SalesSection.php');
    }
}
else{
            $_SESSION['fillx']="fillx";
            header('Location:SalesSection.php');
    }
<?php
require_once 'connect.php';
ob_start();
session_start();
?>
  <?php

if(isset($_POST['p_cat'])&&!empty($_POST['p_cat']))
{
    
    $pcat=mysql_real_escape_string($_POST['p_cat']);
     $_SESSION['c']=$pcat;
    header('Location: SalesSection.php');
      $result=mysql_query("SELECT project.`categories`.`Cat_id` FROM project.`categories` WHERE project.`categories`.`Cat_name`='$pcat' ");
      while ($row=mysql_fetch_array($result,MYSQL_NUM)){
    $cat_id=$row[0];
    }
    $q=mysql_query("SELECT `P_piece` FROM `product` WHERE `Cat_id`='$cat_id'");
    $total=0;
     while ($row=mysql_fetch_array($q,MYSQL_NUM)){
    $total=$total+$row[0];
    }
    if($total==0)
    {
          $_SESSION['zero']="zero";
    header('Location: SalesSection.php');
    }
    else{
     $_SESSION['total']=$total;
    header('Location: SalesSection.php');
    }
}
else{
            $_SESSION['fill']="fill";
            header('Location:SalesSection.php');
    }
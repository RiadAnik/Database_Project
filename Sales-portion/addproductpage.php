<?php
require_once 'connect.php';
ob_start();
session_start();
?>
                <?php

if(isset($_POST['p_name'])&&isset($_POST['p_category'])&&isset($_POST['p_piece'])&&isset($_POST['p_price'])&&isset($_POST['p_model'])&&!empty($_POST['p_name'])&&!empty($_POST['p_category'])&&!empty($_POST['p_piece'])&&!empty($_POST['p_price'])&&!empty($_POST['p_model']))
{
    
    $pname=mysql_real_escape_string($_POST['p_name']);
    $pcat=mysql_real_escape_string($_POST['p_category']);
    $ppiece=mysql_real_escape_string($_POST['p_piece']);
    $pprice=mysql_real_escape_string($_POST['p_price']);
    $pmodel=mysql_real_escape_string($_POST['p_model']);

    $result=mysql_query("SELECT project.`categories`.`Cat_id` FROM project.`categories` WHERE project.`categories`.`Cat_name`='$pcat' ");
    while ($row=mysql_fetch_array($result,MYSQL_NUM)){
    $cat_id=$row[0];
    }
  

$query="SELECT project.`product`.`P_name`,`P_model` FROM project.`product` WHERE project.`product`.`P_name`='$pname' AND project.`product`.`P_model`='$pmodel' ";
$query_run=mysql_query($query); 
if(mysql_num_rows($query_run)>=1)
{
       $_SESSION['Duality']="Duality";
            header('Location: addproduct.php');
}

else {
                    $query=" INSERT INTO project.`product` VALUES(NULL,'$pname', '$cat_id','$ppiece','$pprice','$pmodel','1','active') ";
                    if( $query_run=mysql_query($query)){
                    $_SESSION['added']="added";
                    header('Location: addproduct.php');
                      }
    else{
            $_SESSION['Sorry']="Sorry";
            header('Location: addproduct.php');
}
}
}
else{
            $_SESSION['fill']="fill";
            header('Location: addproduct.php');
    }

?>

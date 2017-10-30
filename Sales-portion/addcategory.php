<?php
require_once 'connect.php';
ob_start();
session_start();
?>
<?php


                                 if(isset($_POST['cat_name'])&&!empty($_POST['cat_name']))
                                      {
                                       $cat_name=mysql_real_escape_string($_POST['cat_name']);
                                       $query="SELECT project.`categories`.`Cat_name` FROM project.`categories` WHERE                                                                                                     project.`categories`.`Cat_name`='$cat_name' ";
    
                                       $query_run=mysql_query($query); 
                                                               if(mysql_num_rows($query_run)==1)
                                                                       {
                                                                               $_SESSION['duality']="duality";
                                                                               header('Location: Categories.php');
                                                                        }

                                                                else {
                                                                        $query=" INSERT INTO project.`categories` VALUES(NULL,'$cat_name', '1') ";
                                                                                           if( $query_run=mysql_query($query)){
                                                                                                                    $_SESSION['insert']="insert";
                                                                                                                    header('Location: Categories.php');
                                                                                                                                      }
                                                                                           else{
                                                                                                                   $_SESSION['Sorry']="Sorry";
                                                                                                                   header('Location: Categories.php');
                                                                                                 }
                                                                                                 }
                                                                                                 }
                                       else{
                                               $_SESSION['fill']="fill";
                                               header('Location: Categories.php');
                                             }



?>

        

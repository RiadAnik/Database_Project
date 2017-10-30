<?php
require_once 'connect.php';
ob_start();
session_start();
?>
<?php


                                 if(isset($_POST['cat_name'])&&isset($_POST['cat_id'])&&!empty($_POST['cat_name'])&&!empty($_POST['cat_id']))
                                      {
                                       $s_name=mysql_real_escape_string($_POST['cat_name']);
                                     $pin=mysql_real_escape_string($_POST['cat_id']);
                                       $query="SELECT project.`salesman`.`S_name` FROM project.`salesman` WHERE                                                                                                     project.`salesman`.`S_name`='$s_name' ";
    
                                       $query_run=mysql_query($query); 
                                                               if(mysql_num_rows($query_run)==1)
                                                                       {
                                                                               $_SESSION['duality']="duality";
                                                                               header('Location: salesman.php');
                                                                        }

                                                                else {
                                                                    $r=mysql_query("SELECT `id` FROM `user` WHERE `password`='$pin'");
                                                                    if(mysql_num_rows($r)==1)
                                                                    {
                                                                        $query=" INSERT INTO project.`salesman` VALUES(NULL,'$s_name') ";
                                                                                           if( $query_run=mysql_query($query)){
                                                                                                                    $_SESSION['insert']="insert";
                                                                                                                    header('Location: salesman.php');
                                                                                                                                      }
                                                                    }
                                                                                           else{
                                                                                                                   $_SESSION['Sorry']="Sorry";
                                                                                                                   header('Location: salesman.php');
                                                                                                 }
                                                                                                 }
                                                                                                 }
                                       else{
                                               $_SESSION['fill']="fill";
                                               header('Location: salesman.php');
                                             }



?>

        

<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
 include('connect.php');
 ob_start();//for login
session_start();//for login
 // check if the 'id' variable is set in URL, and check that it is valid
     if(isset($_POST['select'])&&!empty($_POST['select'])){
                                                                                
                                                                                     $data=$_POST['select'];
      $c=count($data);
    if($c>1)
    {
            $_SESSION['error']="error";
         header('Location: porder.php');
    }
      else{
          
                foreach($data as $selected){
                                                                                    
                                                                                                 $o_id=$selected;
                                               }
         
          $result = mysql_query("DELETE FROM `order` WHERE `O_id`='$o_id'");
 if( $query_run=mysql_query($result)){
         $_SESSION['delete']="delete";
       header('Location: prorder.php');
    }
 
 // redirect back to the view page
 header("Location: prorder.php");
 }
     }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
       $_SESSION['fill']="fill";
 header("Location: prorder.php");
 }
 
?>
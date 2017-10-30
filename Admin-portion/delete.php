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
                                                                                    
                                                                                               $pos_a=strpos($selected,"-");
                                                                                              $o_id=substr($selected,0,$pos_a);
                                                                                              $o_res=substr($selected,($pos_a+1),-1);
                                                                                            $pos_b=strpos($o_res,"+");
                                                                           $p_piece=substr($o_res,0,$pos_b);
                                    $o_resa=substr($o_res,($pos_b+1),-1);
                                    $pos_c=strpos($o_resa,"!");
                                    $p_name=substr($o_resa,0,$pos_c);
                                    $p_model=substr($o_resa,($pos_c+1),-1);
                                    
                         
                                                     
                                               }
         
 
 
          $query_pid=mysql_query("SELECT `P_id`FROM project.`product`WHERE project.`product`.`P_name`='$p_name' AND project.`product`.`P_model`='$p_model'");  
    while($row = mysql_fetch_array($query_pid,MYSQL_NUM) ) {
        $p_cid=$row[0];
    }
 $query_totalpiece=mysql_query("SELECT `P_piece`FROM `product` WHERE  `P_id`='$p_cid' AND `P_name`='$p_name' AND `P_model`='$p_model' ");
      while($row = mysql_fetch_array($query_totalpiece,MYSQL_NUM) ) {
        $tp=$row[0];
    }
          $tp=$tp+$p_piece;
          
          $update_piece=mysql_query("UPDATE `product` SET `P_piece`='$tp' WHERE `P_id`='$p_cid'");
          $result = mysql_query("DELETE FROM `order` WHERE `O_id`='$o_id'");
 if( $query_run=mysql_query($result)){
         $_SESSION['delete']="delete";
       header('Location: porder.php');
    }
 
 // redirect back to the view page
 header("Location: porder.php");
 }
     }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
       $_SESSION['fill']="fill";
 header("Location: porder.php");
 }
 
?>
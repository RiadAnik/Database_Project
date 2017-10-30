<?php
require_once 'connect.php';
ob_start();
session_start();
?>

<?php
        if(isset($_POST['submit'])&&isset($_POST['o_pn'])&&!empty($_POST['submit'])&&!empty($_POST['o_pn']))
        {
         //   require_once 'file_constants.php';
              $o_pn=mysql_real_escape_string($_POST['o_pn']);
    $pos_a=strpos($o_pn,"(");
    $p_name=substr($o_pn,0,$pos_a);
    $o_res=substr($o_pn,($pos_a+1),-1);
    $pos_b=strpos($o_res,"[");
    $p_type=substr($o_res,0,$pos_b);
    $p_model=substr($o_res,($pos_b+1),-1);
 $query_pid=mysql_query("SELECT `P_id`FROM project.`product`WHERE project.`product`.`P_name`='$p_name' AND project.`product`.`P_model`='$p_model'");  
    while($row = mysql_fetch_array($query_pid,MYSQL_NUM) ) {
        $p_cid=$row[0];
    }
            $imagename=mysql_real_escape_string($_FILES["image"]["name"]);
              if(!empty(  $imagename))
            {
           $imagedata=mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
            $imagetype=mysql_real_escape_string($_FILES["image"]["type"]);
          
            if(substr($imagetype,0,5)=="image")
            {
            $query_same=mysql_query("SELECT `P_image` FROM `product_image` WHERE `P_id`='$p_cid'");
                  if(mysql_num_rows($query_same)==0)
                                                            {
            $query="INSERT INTO `product_image`(`P_id`, `P_image`) VALUES ('$p_cid','$imagedata')";
                  if( $query_run=mysql_query($query)){
                      $_SESSION['done']="done";
                       header('Location: addproduct.php');                                                                                            
                      
            
                  }
            }
              else{
                       $_SESSION['dualityi']="dualityi";
                       header('Location: addproduct.php');    
            }
            }
                  else{
                      $_SESSION['imagetype']="imagetype";
                       header('Location: addproduct.php'); 
                  }
              }
            else{
                 $_SESSION['noimage']="noimage";
                       header('Location: addproduct.php'); 
            }
            }
        
             else{
               
                 $_SESSION['fillc']="fillc";
                       header('Location: addproduct.php'); 
        }
           
            
?>
<?php
require_once 'connect.php';
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(empty($_SESSION['user_id'])){
        header('Location:loginform.inc.php');
    
}
//session_start();
?>
<?php
     if(isset($_POST['select'])&&!empty($_POST['select'])){
                                                                                
                                                                                     $data=$_POST['select'];
          
                foreach($data as $selected){
                                                                                    
                                                                                                $pos_a=strpos($selected,"-");
                                                                                              $p_name=substr($selected,0,$pos_a);
                                                                                           $o_res=substr($selected,($pos_a+1),-1);
                                    $pos_b=strpos($o_res,"@");
                                    $p_piece=substr($o_res,0,$pos_b);
                                    $p_model=substr($o_res,($pos_b+1),-1);
                         
                                                     
                                               }
         if($p_piece==0)
         {
     $p_idget=mysql_query("SELECT `P_id` FROM `product`WHERE `P_name`='$p_name'AND `P_model`='$p_model'");
            while($row = mysql_fetch_array($p_idget,MYSQL_NUM) ) { 
                                                                       $p_id=$row[0];
                                                                      
                                      }
          $query_up="UPDATE `product` SET `status`='pending' WHERE `P_id`='$p_id'";
          if( $query_run=mysql_query($query_up))
          {
              $_SESSION['request']="request";
         header('Location: deleteproduct.php');

          }
          else
          {
             $_SESSION['nodata']="nodata";
         header('Location: deleteproduct.php');   
          }
         }
         else{
              $_SESSION['zero']="zero";
         header('Location: deleteproduct.php');   
         }
}
else{
     $_SESSION['fill']="fill";
         header('Location: deleteproduct.php');   
}
    ?>
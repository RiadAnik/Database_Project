<?php
require_once 'core.inc.php';
require_once 'connect.inc.php';
ob_start();
?>               
<?php
  if(isset($_POST['select'])&&!empty($_POST['select'])){
                                                                                     $data=$_POST['select'];
    
                                                 foreach($data as $selected){
                                                                                              $pos_a=strpos($selected,"-");
                                                                                              $name=substr($selected,0,$pos_a);
                                                       $model=substr($selected,($pos_a+1),-1);
                                                                                           
                                                    
                                               }
    $p_idget=mysql_query("SELECT `P_id` FROM `product`WHERE `P_name`='$name'AND `P_model`='$model'");
            while($row = mysql_fetch_array($p_idget,MYSQL_NUM) ) { 
                                                                       $p_id=$row[0];
                                                                      
            }
          $query_up="UPDATE `product` SET `status`='active' WHERE `P_id`='$p_id'";
          if( $query_run=mysql_query($query_up))
          {
              $_SESSION['active']="active";
         header('Location: product.php');

          }
          else
          {
             $_SESSION['nodataa']="nodataa";
         header('Location: product.php');   
          }
  
  }
  else{
           $_SESSION['fillxx']="fillxx";
         header('Location: product.php');

   }
?>
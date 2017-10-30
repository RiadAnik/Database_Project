<?php
require_once 'connect.php';
ob_start();
session_start();
?>               
<?php
  if(isset($_POST['select'])&&isset($_POST['price'])&&!empty($_POST['select'])&&!empty($_POST['price'])){
                                                                                
                                                                                     $p_price=mysql_real_escape_string($_POST['price']);
                                                                                    
                                                                                     $data=$_POST['select'];
      $c=count($data);
    if($c>1)
    {
            $_SESSION['error']="error";
         header('Location: repairproductupdate.php');
    }
      else{
    
                                                 foreach($data as $selected){
                                                                                              $pos_a=strpos($selected,"-");
                                                                                              $new_price=substr($selected,0,$pos_a);
                                                                                              $pname=substr($selected,($pos_a+1),-1);
                            
                                                   
                                               }
      $query=mysql_query("SELECT `P_id` FROM `product` WHERE `P_name`='$pname'AND `D_id`='2'");
           while ($row=mysql_fetch_array($query,MYSQL_NUM)){
    $p_id=$row[0];
    }
          $query_up="UPDATE `product` SET `P_unitprice`='$p_price' WHERE `P_id`='$p_id'";
          if( $query_run=mysql_query($query_up))
          {
              $_SESSION['insert']="insert";
         header('Location: repairproductupdate.php');

          }
          else
          {
             $_SESSION['nodata']="nodata";
         header('Location: repairproductupdate.php');   
          }
  }
  }
  else{
           $_SESSION['fillx']="fillx";
         header('Location: repairproductupdate.php');

   }
?>
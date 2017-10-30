<?php
require_once 'connect.php';
ob_start();
session_start();
?>               
<?php
  if(isset($_POST['select'])&&isset($_POST['piece'])&&isset($_POST['price'])&&!empty($_POST['select'])&&!empty($_POST['piece'])&&!empty($_POST['price'])){
                                                                                     $p_piece=mysql_real_escape_string($_POST['piece']);
                                                                                     $p_price=mysql_real_escape_string($_POST['price']);
                                                                                    
                                                                                     $data=$_POST['select'];
      $c=count($data);
    if($c>1)
    {
            $_SESSION['error']="error";
         header('Location: productupdate.php');
    }
      else{
    
                                                 foreach($data as $selected){
                                                                                              $pos_a=strpos($selected,"-");
                                                                                              $p_name=substr($selected,0,$pos_a);
                                                                                              $p_model=substr($selected,($pos_a+1),-1);
                            
                                                     
                                               }
      $query=mysql_query("SELECT `P_id` FROM `product` WHERE `P_name`='$p_name'AND `P_model`='$p_model'");
           while ($row=mysql_fetch_array($query,MYSQL_NUM)){
    $p_id=$row[0];
    }
          $query_up="UPDATE `product` SET `P_piece`='$p_piece',`P_unitprice`='$p_price' WHERE `P_id`='$p_id'";
          if( $query_run=mysql_query($query_up))
          {
              $_SESSION['insert']="insert";
         header('Location: productupdate.php');

          }
          else
          {
             $_SESSION['nodata']="nodata";
         header('Location: productupdate.php');   
          }
  }
  }
  else{
           $_SESSION['fillx']="fillx";
         header('Location: productupdate.php');

   }
?>
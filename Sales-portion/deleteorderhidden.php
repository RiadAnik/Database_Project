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
      $c=count($data);
    if($c>1)
    {
            $_SESSION['error']="error";
         header('Location: deleteorder.php');
    }
      else{
          
                foreach($data as $selected){
                                                                                    
                                                                                              $o_id=$selected;
                         
                                                     
                                               }
     $query_same=mysql_query("SELECT `O_id` FROM `invoice_details` WHERE `O_id`='$o_id'");
            
                                       if(mysql_num_rows($query_same)==0)
                                                            {    
          $query_up="UPDATE `order` SET `status`='pending' WHERE `O_id`='$o_id'";
          if( $query_run=mysql_query($query_up))
          {
              $_SESSION['request']="request";
         header('Location: deleteorder.php');

          }
          else
          {
             $_SESSION['nodata']="nodata";
         header('Location: productupdate.php');   
          }
  }
          else{
                $_SESSION['duality']="duality";
         header('Location: deleteorder.php');   
          }
  }
   }
else{
     $_SESSION['fill']="fill";
         header('Location: deleteorder.php');   
}
    ?>
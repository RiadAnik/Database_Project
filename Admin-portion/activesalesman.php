<?php
require_once 'connect.php';
ob_start();
session_start();
?>               
<?php
  if(isset($_POST['select'])&&!empty($_POST['select'])){
                                                                                     $data=$_POST['select'];
      $c=count($data);
    if($c>1)
    {
            $_SESSION['error']="error";
         header('Location: salesman.php');
    }
      else{
    
                                                 foreach($data as $selected){
                                                                                              $pos_a=strpos($selected,"-");
                                                                                              $sname=substr($selected,0,$pos_a);
                                                                                           
                                                    
                                               }
          $_SESSION['sname']=$sname;
    header('Location: salesman.php');
      $query=mysql_query("SELECT `S_id` FROM `salesman` WHERE `S_name`='$sname'");
           while ($row=mysql_fetch_array($query,MYSQL_NUM)){
    $p_id=$row[0];
    }
          $query_up="UPDATE `salesman` SET `status`='active' WHERE `S_id`='$p_id'";
          if( $query_run=mysql_query($query_up))
          {
              $_SESSION['active']="active";
         header('Location: salesman.php');

          }
          else
          {
             $_SESSION['nodata']="nodata";
         header('Location: salesman.php');   
          }
  }
  }
  else{
           $_SESSION['fills']="fills";
         header('Location: salesmanhistory.php');

   }
?>
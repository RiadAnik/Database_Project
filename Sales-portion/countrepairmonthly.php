<?php
require_once 'connect.php';
ob_start();
session_start();
?>
<?php

if(isset($_POST['s_month'])&&!empty($_POST['s_month']))
{
    $pcat=mysql_real_escape_string($_POST['s_month']);
    $_SESSION['pcat']=$pcat;
    header('Location: RepairSection.php');
     $time=strtotime($pcat);
$month=date("F",$time);
$year=date("Y",$time);
    $date=mysql_query("SELECT `O_date` FROM `order`WHERE `D_id`='2' ");
   $tt=0;
    while($row=mysql_fetch_array($date,MYSQL_NUM)){
        $dateValue=$row[0];
    //echo $dateValue;
       // die();
    $time=strtotime($dateValue);
$montho=date("F",$time);
$yearo=date("Y",$time);
        if($month==$montho&&$year==$yearo){
            $t=mysql_query("SELECT `O_price` FROM `order` WHERE `O_date`='$dateValue'AND `D_id`='2'");
            
             while($row=mysql_fetch_array($t,MYSQL_NUM)){
                 $tt=$tt+$row[0];
             }
        }
    }
     if($t==0)
    {
          $_SESSION['no']="no";
    header('Location: RepairSection.php');
    }
    else{
     $_SESSION['tt']=$tt;
    header('Location: RepairSection.php');
    }
}
else{
            $_SESSION['fills']="fills";
            header('Location:RepairSection.php');
    }    

    ?>
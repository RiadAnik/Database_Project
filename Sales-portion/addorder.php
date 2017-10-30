<?php
require_once 'connect.php';
ob_start();
session_start();
?>               
<?php
$date=date("Y-m-d");
if(isset($_POST['o_pn'])&&isset($_POST['o_cn'])&&isset($_POST['o_p'])&&!empty($_POST['o_pn'])&&!empty($_POST['o_cn'])&&!empty($_POST['o_p']))
{
    

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
    $o_cn=mysql_real_escape_string($_POST['o_cn']);
    $pos_ca=strpos($o_cn,"(");
    $c_name=substr($o_cn,0,$pos_ca);
    $c_phone=substr($o_cn,($pos_ca+1),-1);
    $query_cid=mysql_query("SELECT `C_id`FROM project.`customer`WHERE project.`customer`.`C_Fname`='$c_name' AND project.`customer`.`C_phone`='$c_phone'");
     while($row = mysql_fetch_array($query_cid,MYSQL_NUM) ) {
        $c_cid=$row[0];
    }
    $o_p=mysql_real_escape_string($_POST['o_p']);
    
    $query_totalpiece=mysql_query("SELECT `P_piece`FROM `product` WHERE  `P_id`='$p_cid' AND `P_name`='$p_name' AND `P_model`='$p_model' ");
      while($row = mysql_fetch_array($query_totalpiece,MYSQL_NUM) ) {
        $tp=$row[0];
    }
    $remain_piece=$tp-$o_p;
    //echo $remain_piece;
    //die();
    if($remain_piece>=0){
    $query_updatepiece="UPDATE `product` SET `P_piece`='$remain_piece' WHERE `P_id`='$p_cid' ";
      $query_run=mysql_query($query_updatepiece);
        //echo $tp;
    //die();
    
   
    $query_pprice=mysql_query("SELECT `P_unitprice`FROM project.`product`WHERE project.`product`.`P_id`='$p_cid' ");
while($row = mysql_fetch_array($query_pprice,MYSQL_NUM) ) {
        $p_price=$row[0];
    }
    $p_p=$p_price*$o_p;
     
$query=" INSERT INTO project.`order` VALUES(NULL,'$p_cid', '$o_p','$c_cid','$p_p','$date','1','$p_type','$p_model','null') ";
   if( $query_run=mysql_query($query)){
         $_SESSION['new']="new";
       header('Location: order.php');
    }
        else{
               $_SESSION['sorry']="sorry";
         header('Location: order.php');
        }
        
    }
     else{
           $_SESSION['nopiece']="nopiece";
         header('Location: order.php');
    }
    }
    else{
        $_SESSION['fill']="fill";
         header('Location: order.php');
}   

    
?>

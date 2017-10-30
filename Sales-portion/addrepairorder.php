<?php
require_once 'connect.php';
ob_start();
session_start();
?>               
<?php
if(empty($_SESSION['loggedin'])){
        header('Location:loginform.inc.php');
    
    unset($_SESSION['duality']);
}
$date=date("Y-m-d");
if(isset($_POST['o_sn'])&&isset($_POST['o_cn'])&&isset($_POST['o_cat'])&&isset($_POST['o_model'])&&!empty($_POST['o_sn'])&&!empty($_POST['o_cn'])&&!empty($_POST['o_cat'])&&!empty($_POST['o_model']))
{
    $pname=mysql_real_escape_string($_POST['o_sn']);
    $pmodel=mysql_real_escape_string($_POST['o_model']);
    $o_cn=mysql_real_escape_string($_POST['o_cn']);
     $o_cat=mysql_real_escape_string($_POST['o_cat']);
    $pos_ca=strpos($o_cn,"(");
    $c_name=substr($o_cn,0,$pos_ca);
    $c_phone=substr($o_cn,($pos_ca+1),-1);
    $query_cid=mysql_query("SELECT `C_id`FROM project.`customer`WHERE project.`customer`.`C_Fname`='$c_name' AND project.`customer`.`C_phone`='$c_phone'");
     while($row = mysql_fetch_array($query_cid,MYSQL_NUM) ) {
        $c_cid=$row[0];
    }
 

        $query_name=mysql_query("SELECT `P_id`FROM project.`product`WHERE project.`product`.`P_name`='$pname' ");
        while($row = mysql_fetch_array($query_name,MYSQL_NUM) ) {
        $p_id=$row[0];
    }

   $query_pprice=mysql_query("SELECT `P_unitprice`FROM project.`Product` WHERE project.`Product`.`P_id`='$p_id' ");
        
while($row = mysql_fetch_array($query_pprice,MYSQL_NUM) ) {
        $p_price=$row[0];
    }
       //echo $p_price;
        //die();
$query=" INSERT INTO project.`order` VALUES(NULL,'$p_id', '0','$c_cid','$p_price','$date','2','$o_cat','$pmodel','null') ";
   if( $query_run=mysql_query($query)) {
         $_SESSION['new']="new";
       header('Location: repairorder.php');
    }
         else{
           $_SESSION['sorry']="sorry";
         header('Location: repairorder.php');
    }
}
    else{
        $_SESSION['fill']="fill";
         header('Location: repairorder.php');

}

?>

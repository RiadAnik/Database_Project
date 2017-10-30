<?php
require_once 'connect.php';
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(empty($_SESSION['user_id'])){
        header('Location:loginform.inc.php');
    
}
?>
<?php
if(isset($_POST['o_pn'])&&!empty($_POST['o_pn']))
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
    $query_pid=mysql_query("SELECT `P_image` FROM `product_image` WHERE `P_id`='$p_cid'");
    if(mysql_num_rows($query_pid)==1)
    {
     $result = "DELETE FROM `product_image` WHERE `P_id`='$p_cid'";
        if($query_run=mysql_query($result)){
         $_SESSION['deletei']="deletei";
       header('Location: addproduct.php');
    }
    }
    else{
         $_SESSION['nodatai']="nodatai";
       header('Location: addproduct.php');
    }
}
else{
      $_SESSION['nodata']="nodata";
       header('Location: addproduct.php');
}
    
?>
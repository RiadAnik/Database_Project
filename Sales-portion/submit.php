<?php
require_once 'connect.php';
ob_start();
session_start();
?>
<?php
                                           
                                            if(isset($_POST['select'])&&isset($_POST['vat'])&&isset($_POST['sales_man'])){
                                                                                     $p_vat=mysql_real_escape_string($_POST['vat']);
                                                                                     $sales_man=mysql_real_escape_string($_POST['sales_man']);
                                                                                     $total_price=0;
                                            if(!empty($_POST['select'])&&!empty($_POST['vat'])&&!empty($_POST['sales_man'])){
                                                                                     $data=$_POST['select'];
                                            foreach($data as $selected){
                                                                                              $pos_a=strpos($selected,"-");
                                                                                              $o_id=substr($selected,0,$pos_a);
$query_same=mysql_query("SELECT `O_id` FROM `invoice_details` WHERE `O_id`='$o_id'");
            
                                       if(mysql_num_rows($query_same)==0)
                                                            {
                               
                                           
                                                                                                                                
                                    $o_res=substr($selected,($pos_a+1),-1);
                                    $pos_b=strpos($o_res,"=");
                                    $p_name=substr($o_res,0,$pos_b);
                                    $o_resa=substr($o_res,($pos_b+1),-1);
                                    $pos_c=strpos($o_resa,"*");
                                    $p_model=substr($o_resa,0,$pos_c);
                                    $o_resb=substr($o_resa,($pos_c+1),-1);
                                    $pos_d=strpos($o_resb,"+");
                                    $p_piece=substr($o_resb,0,$pos_d);
                                    $o_resc=substr($o_resb,($pos_d+1),-1);
                                    $pos_e=strpos($o_resc,"!");
                                    $p_cn=substr($o_resc,0,$pos_e);
                                    $o_resd=substr($o_resc,($pos_e+1),-1);
                                    $pos_f=strpos($o_resd,"@");
                                    $c_num=substr($o_resd,0,$pos_f);
                                    $p_tt=substr($o_resd,($pos_f+1),-1);
                                                                   $total_price=$total_price+$p_tt ;
                                                                   $vat_total=$total_price*($p_vat/100);
                                                                   $payment=$vat_total+$total_price;
                                                $result=mysql_query("SELECT project.`customer`.`C_id`FROM project.`customer` WHERE                                                                                                                project.`customer`.`C_Fname`='$p_cn'AND project.`customer`.`C_phone`='$c_num'");
                                      while($row = mysql_fetch_array($result,MYSQL_NUM) ) { 
                                                                       $i_cid=$row[0];
                                                                      
                                      }
                                        
                                                                       $date=date("Y-m-d");
        $query_s=mysql_query("SELECT project.`salesman`.`S_id`FROM project.`salesman` WHERE `S_name`='$sales_man';");
                                      while($row = mysql_fetch_array($query_s,MYSQL_NUM) ) {
                                                                       $i_sid=$row[0];
                                      }
                                       }
                                            
                                      else{
                                                         $_SESSION['dualitys']="dualitys";
                                                         header('Location: order.php');
                               }
                                            }
                                            
                                                 $query_invoice="INSERT INTO project.`invoice` (`I_id`, `C_id`, `I_subtotal`, `I_vat`, `I_totalcost`,                                                            `I_date`, `s_id`, `D_id`) VALUES(NULL, '$i_cid', '$total_price', '$p_vat', '$payment', '$date', '$i_sid', '1')";
                                                  $query_run=mysql_query($query_invoice);
                                                                                             
                                                  
                                                                                             
                                            
                                            }
                                            }
  else{
           $_SESSION['fillx']="fillx";
         header('Location: order.php');

   }
?>




<?php
if(isset($_POST['select'])&&isset($_POST['vat'])&&isset($_POST['sales_man'])&&!empty($_POST['select'])&&!empty($_POST['vat'])&&!empty($_POST['sales_man'])){
$query_same=mysql_query("SELECT `O_id` FROM `invoice_details` WHERE `O_id`='$o_id'");
            
                                       if(mysql_num_rows($query_same)==0)
                                                             {
            $query_iid=mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'project' AND                                                     TABLE_NAME = 'invoice'");
                                        while($row = mysql_fetch_array($query_iid,MYSQL_NUM) ) {
                                                           $id_iid=$row[0];
                                                           $id_last=$id_iid-1;
                                                                                                                                 }
                                           $_SESSION['id_last']=$id_last;
                                            header('Location: invoicelayout.php');
                                        
                    if(isset($_POST['select'])&&isset($_POST['vat'])&&isset($_POST['sales_man'])){
                    if(!empty($_POST['select'])&&!empty($_POST['vat'])&&!empty($_POST['sales_man'])){
                    $data=$_POST['select'];
                                                     foreach($data as $selected){
                                                                    $pos_a=strpos($selected,"-");
                                                                    $o_id=substr($selected,0,$pos_a);
                                                                    $query_idetails=" INSERT INTO project.`invoice_details` VALUES('$id_last','$o_id') ";
                                                                    $query_run=mysql_query($query_idetails);
                                                                                               }
                                                                                               }
                    }
                                       }
else{
   $_SESSION['dualitys']="dualitys";
                                                         header('Location: order.php');
}
}
   else{
           $_SESSION['fillx']="fillx";
         header('Location: order.php');

   }
?>    
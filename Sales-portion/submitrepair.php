<?php
require_once 'connect.php';
ob_start();
session_start();
?>
<?php
                                           
                                            if(isset($_POST['select'])&&isset($_POST['vat'])&&isset($_POST['sales_man'])){
                                                                                     $p_vat=mysql_real_escape_string($_POST['vat']);
                                                                                     $sales_man=mysql_real_escape_string($_POST['sales_man']);
                                             //   echo $sales_man;
                                                                                     $total_price=0;
                                            if(!empty($_POST['select'])&&!empty($_POST['vat'])&&!empty($_POST['sales_man'])){
                                                                                     $data=$_POST['select'];
                                            foreach($data as $selected){
                                                                                              $pos_a=strpos($selected,"-");
                                                                                              $o_id=substr($selected,0,$pos_a);
                                                    $o_res=substr($selected,($pos_a+1),-1);
                                    $pos_b=strpos($o_res,"=");
                                    $c_name=substr($o_res,0,$pos_b);
                                    $o_resa=substr($o_res,($pos_b+1),-1);
                                    $pos_c=strpos($o_resa,"*");
                                    $c_phone=substr($o_resa,0,$pos_c);
                                            //    echo $o_id;
                                               // die();
                                             

$query_same=mysql_query("SELECT `O_id` FROM `invoice_details` WHERE `O_id`='$o_id'");
            
                                       if(mysql_num_rows($query_same)==0)
                                                              {
                               
                                           
                                                                                                                                
                                
                                    $o_resb=substr($o_resa,($pos_c+1),-1);
                                    $pos_d=strpos($o_resb,"+");
                                    $o_service=substr($o_resb,0,$pos_d);
                                    $o_resc=substr($o_resb,($pos_d+1),-1);
                                    $pos_e=strpos($o_resc,"!");
                                    $o_price=substr($o_resc,0,$pos_e);
                                    $o_resd=substr($o_resc,($pos_e+1),-1);
                                    $pos_f=strpos($o_resd,"@");
                                    $p_name=substr($o_resd,0,$pos_f);
                                           
                                   // $date=substr($o_resd,($pos_f+1),-1);
                                           $o_rese=substr($o_resd,($pos_f+1),-1);
                                    $pos_g=strpos($o_rese,"^");
                                    $date=substr($o_rese,0,$pos_g);
                                    //
                                           $o_resf=substr($o_rese,($pos_g+1),-1);
                                    $pos_h=strpos($o_resf,"(");
                                    $brand=substr($o_resf,0,$pos_h);
                                               $_SESSION['brand']=$brand;
                                            header('Location: rerpairinvoice.php');
                                          // echo $brand;
                                        
                                            $model=substr($o_resf,($pos_h+1),-1);
                                            //echo $model;
                                           //die();
                                       $_SESSION['model']=$model;
                                            header('Location: rerpairinvoice.php');
                        
                                                                $total_price=$total_price+$o_price ;
                                                                   $vat_total=$total_price*($p_vat/100);
                                                                   $payment=$vat_total+$total_price;
                                              $result=mysql_query("SELECT project.`customer`.`C_id`FROM project.`customer` WHERE                                                                                                                project.`customer`.`C_Fname`='$c_name'AND project.`customer`.`C_phone`='$c_phone'");
                                                                                      while($row = mysql_fetch_array($result,MYSQL_NUM) ) { 
                                                                       $i_cid=$row[0];
                                      }
                                      //    echo $i_cid;
                                         //  die();
                                                                       //$date=date("Y-m-d");
        $query_s=mysql_query("SELECT project.`salesman`.`S_id`FROM project.`salesman` WHERE `S_name`='$sales_man';");
                                      while($row = mysql_fetch_array($query_s,MYSQL_NUM) ) {
                                                                       $i_sid=$row[0];
                                      }
                                       }
   //                                        die();
                                                else{
                                                         $_SESSION['dualitys']="dualitys";
                                                         header('Location: repairorder.php');
                               }
                                            }
                                      
                                                 $query_invoice="INSERT INTO project.`invoice` (`I_id`, `C_id`, `I_subtotal`, `I_vat`, `I_totalcost`,                                                            `I_date`, `s_id`, `D_id`) VALUES(NULL, '$i_cid', '$total_price', '$p_vat', '$payment', '$date', '$i_sid', '2')";
                                                  $query_run=mysql_query($query_invoice);
                                       

                                            }
                                              
                                            }
                                             

                                            
                                            
                                        
  else{
           $_SESSION['fillx']="fillx";
         header('Location: repairorder.php');

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
                                            header('Location: rerpairinvoice.php');
                                        
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
                                                         header('Location: repairorder.php');
}
}
   else{
           $_SESSION['fillx']="fillx";
         header('Location: repairorder.php');

   }
?>    
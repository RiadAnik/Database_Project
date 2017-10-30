<?php
require_once 'core.inc.php';
require_once 'connect.inc.php';
if(empty($_SESSION['user_id'])){
        header('Location:verticalnavbar.php');
    
    //unset($_SESSION['loggedin']);
} 
?>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="description" content="">
    <meta name="author" content="">

    <title>IT_MART</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="admi.css" rel="stylesheet">
</head>

<body >
     <!-------------------header & Navbar div-------------------->
    <div class="row header container-fluid">
        <div class="col-md-3">
            <img src="logo.png" alt="IT_MART">
        </div>
         <div class="col-md-9">
             <p class="navbar-text">Signed in as Admin
            
      </div>
    </div>

</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
      </p>
            </div>
    </div>     
      <!-----/////////--end of header div-----////////////------->
    
    <div class="container-fluid row section">
    <!----///////////---------Start Sidebar---/////////////-------->
        <div class ="col-md-3 sidebar">
             <ul class="nav nav-pills nav-stacked">
                 <li role="presentation" class="active"><a href="#">Dashboard
                      </a></li>
                 <li role="presentation"><a href="porder.php">Pending Delete Order(sales)</a></li>
                  <li role="presentation"><a href="prorder.php">Pending Delete Order(Repair)</a></li>
                  <li role="presentation" ><a href="product.php">Product</a></li>
                    <li role="presentation"><a href="salesman.php">Salesman</a></li><br><br><br><br>
                <li role="presentation" ><a href="logout.php">Logout</a></li>
            </ul>           
        </div>
        
        <!--------//////////----------end  Sidebar --------//////////------->
        <!------////////////------start Content--------/////////////////////----->
        <div class="col-md-9 content" >
            <div class="col-md-6 content" >
            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Today's Capital</h2>
            <?php
$date=date("Y-m-d");
 echo "<p style='color:#380000;text-align:left;font-size:30px;
                                        padding-top:20px'>
                               <strong>&nbsp;&nbsp;Date : $date</strong></p>";
?>
            <h3>&nbsp;&nbsp;Sales Department:</h3>
            
            <?php
          $pcat=date("Y-m-d");
$d = date_parse_from_format("Y-m-d", $pcat);
date_default_timezone_set('asia/dhaka');
$y=date("h:i:sa");
    $query=mysql_query("SELECT project.`order`.`O_price` FROM project.`order` WHERE project.`order`.`O_date`='$pcat' AND project.`order`.`D_id`='1'");
     $t=0;
     while ($row=mysql_fetch_array($query,MYSQL_NUM)){
    $t=$t+$row[0];
    }
    
     echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Today's income is $t Taka till $y .</strong></p>";
        ?>
                <h3>&nbsp;Repair Department :</h3>
                 <?php
    $pcat=date("Y-m-d");
    $q=mysql_query("SELECT project.`order`.`O_price` FROM project.`order` WHERE project.`order`.`O_date`='$pcat' AND project.`order`.`D_id`='2'");
     $t=0;
     while ($row=mysql_fetch_array($q,MYSQL_NUM)){
    $t=$t+$row[0];
    }
     echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Today's income is $t Taka till $y .</strong></p>";
        
?>
            </div>
            <div class="col-md-6 content" >
        <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This month's Capital</h2>
                <?php
$pcat=date("Y-m-d");
$time=strtotime($pcat);
$month=date("F",$time);
$year=date("Y",$time);
echo "<p style='color:#380000;text-align:left;font-size:30px;
                                        padding-top:20px'>
                               <strong>Month : $month, $year.</strong></p>";
?>
                <h3>Sales Department:</h3>
            <?php
$pcat=date("Y-m-d");
    
     $time=strtotime($pcat);
$month=date("F",$time);
$year=date("Y",$time);
    $date=mysql_query("SELECT `O_date` FROM `order`WHERE `D_id`='1' ");
   $tt=0;
    while($row=mysql_fetch_array($date,MYSQL_NUM)){
        $dateValue=$row[0];
    //echo $dateValue;
       // die();
    $time=strtotime($dateValue);
$montho=date("F",$time);
$yearo=date("Y",$time);
        if($month==$montho&&$year==$yearo){
            $t=mysql_query("SELECT `O_price` FROM `order` WHERE `O_date`='$dateValue'AND `D_id`='1'");
            
             while($row=mysql_fetch_array($t,MYSQL_NUM)){
                 $tt=$tt+$row[0];
             }
        }
    }
 echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong> $tt Taka till today .</strong></p>";
      

?>
 <h3>Repair Department:</h3>
                <?php
  $pcat=date("Y-m-d");
     $time=strtotime($pcat);
$month=date("F",$time);
$year=date("Y",$time);
    $date=mysql_query("SELECT `O_date` FROM `order`WHERE `D_id`='2' ");
   $tr=0;
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
                 $tr=$tr+$row[0];
             }
        }
    }
echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong> $tr Taka till today .</strong></p>";
?>
            </div>
      			</div><!-- /span3 -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

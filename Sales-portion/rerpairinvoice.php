<?php
require_once 'connect.php';
//session_start();
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(empty($_SESSION['user_id'])){
        header('Location:loginform.inc.php');
    
    //unset($_SESSION['loggedin']);
}
?>
<html>
    <head>
        <style>
            .main{
                width:750px;
                margin: auto;
                height: 750px;
                 background-color: #FFFFC0;
            }
        header{
             text-align:center;
            background-color:#667A44;
        }
            section {
    width:350px;
    height: 200px;
    float:right;
    padding:8px;
/*     background-color: #FFFFC0;*/
}
         .b{
    width:350px;
    float:left;
             height: 200px;
    padding:8px;
         }
            .c{
    position: relative;
    float:right;
                margin-bottom: auto;
    width: 350px;
            }
            footer {
    background-color:#667A44;
    color:white;
    margin-left: 290px;
    margin-right: 290px;
                clear: both;
    text-align:center;
    padding:5px;	 	 
}
            p{
                margin-left: 40px;
            }
            h1{
                margin-left: 40px;
            }
           h4{
               margin-left: 100px;
           }
               .table {
                   width:100%;
           position: relative;
                   float: left;                   
            
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
            table#t01{
/*                top:170px;*/
            }
        table#t01 tr:nth-child(even) {
            background-color: #eee;
        
        }
        table#t01 tr:nth-child(odd) {
           background-color:#eee;

        }
            table#t03 tr:nth-child(even) {
            background-color: #eee;
        width: 300px;
        }
        table#t03 tr:nth-child(odd) {
           background-color:#eee;
width:300px;
        }
        table#t02 tr:nth-child(even) {
            background-color: #eee;
        }
        table#t02 tr:nth-child(odd) {
           background-color:#fff;
        }
        table#t02 th	{
            background-color: #667A44;
            color: black;
        }

        </style>
    <body>
<div class="main">
        <header>
<h1>Invoice</h1>
</header>
    </head>
        <div class="b"><img src="logo.PNG"/><br>
            <h5>Address:CUET,chittagong-3456<br>contact:01786075320</h5></div>
        <section>
        <?php

if(isset($_SESSION['id_last'])&&!empty($_SESSION['id_last'])){
    $var=$_SESSION['id_last'];
     unset($_SESSION['id_last']);
}
    $c_id=mysql_query("SELECT `invoice`.`C_id` FROM `invoice` WHERE `invoice`.`I_id`='$var'");
    while($row = mysql_fetch_array($c_id,MYSQL_NUM) ) {
                                                           $cid=$row[0];
                                                 }
   $c_name=mysql_query("SELECT `C_Fname`,`C_Lname` FROM `customer` WHERE `C_id`='$cid'");
 $c_phone=mysql_query("SELECT `C_phone` FROM `customer` WHERE `C_id`='$cid'");
$sid=mysql_query("SELECT `s_id` FROM `invoice` WHERE `I_id`='$var'");
while($row = mysql_fetch_array($sid,MYSQL_NUM) ) {
                                                           $si=$row[0];
                                                 }
$sname=mysql_query("SELECT `S_name` FROM `salesman` WHERE `S_id`='$si'");
$dat=mysql_query("SELECT `invoice`.`I_date` FROM `invoice` WHERE `invoice`.`I_id`='$var'");
$oid=mysql_query("SELECT `invoice_details`.`O_id`FROM `invoice_details` WHERE `invoice_details`.`I_id`='$var'");
$vat=mysql_query("SELECT `I_vat` FROM `invoice` WHERE `I_id`='$var'");
$tt=mysql_query("SELECT `I_totalcost` FROM `invoice` WHERE `I_id`='$var'");
?>
            
    
    
     <!--<div class="table">-->
        <table id="t03">
            <?php
$cn="Customer Name :";
$space=" ";
while($row = mysql_fetch_array($c_name,MYSQL_NUM) ) {
                                                echo "<tr>";
        echo "<th>".$cn."</th>";
          echo "<td>".$row[0].$space.$row[1]."</td>";
          echo " </tr>";
}
$Phone="Phone:";
while($row = mysql_fetch_array($c_phone,MYSQL_NUM) ) {
               echo "<tr>";
echo "<th>".$Phone."</th>";
                echo "<td>".$row[0]."</td>";
            echo "</tr>";
}
$Sal="Repairman:";
while($row = mysql_fetch_array($sname,MYSQL_NUM) ) {
                echo "<tr>";
        echo  "<th>".$Sal."</th>";
                echo    "<td>".$row[0]."</td>";
                   echo "</tr>";
}
$date="Date :";
while($row = mysql_fetch_array($dat,MYSQL_NUM) ) {
            echo "<tr>";
            echo "<th>".$date."</th>";	
                echo "<td>".$row[0]."</td>";
        echo"</tr>";
}
?>
            <tr>
            <th>Department</th>
                <th>Repair</th>
            </tr>
            <?php
if(isset($_SESSION['brand'])&&!empty($_SESSION['brand'])){
    $vari=$_SESSION['brand'];
     unset($_SESSION['brand']);
}
if(isset($_SESSION['model'])&&!empty($_SESSION['model'])){
    $varr=$_SESSION['model'];
    unset($_SESSION['model']);
}

?>
            </table>
            <br><br><br>
           <!-- </div>-->
        </section>
        <table id="t02" width="100%">
            
<tr>
    <th>Order id</th>
            <th>Brand</th>		
            <th>Product</th>
            <th>Model</th>
    <th>Problem</th>
             <th>Total price</th>
            <?php
while($row = mysql_fetch_array($oid,MYSQL_NUM) ) {
    $oiid=$row[0];
      $details=mysql_query("SELECT `order`.`O_id`,`Category`,`O_price`,`product`.`P_name`
FROM `order`
INNER JOIN `product` ON `order`.`P_id`=`product`.`P_id`
 WHERE `order`.`O_id`='$oiid'");
    while($row = mysql_fetch_array($details,MYSQL_NUM) ) {
echo "<tr>";
           echo " <td>".$row[0]."</td>";
            echo "<td>".$vari."</td>";		
            echo " <td>".$row[1]."</td>";
            echo "<td>".$varr."</td>";
            echo "<td>".$row[3]."</td>";
        echo "<td>".$row[2]." tk"."</td>";
            echo "</tr>";
    }
}
?>
       
       

          </table>
        <br><br><br><br><br>
        <div class="table">
        <table id="t01" class="c">
     <?php       
$Sal="Vat :";
while($row = mysql_fetch_array($vat,MYSQL_NUM) ) {
                echo "<tr>";
        echo  "<th>".$Sal."</th>";
                echo    "<td>".$row[0]." %"."</td>";
                   echo "</tr>";
}
$date="Total Price :";
while($row = mysql_fetch_array($tt,MYSQL_NUM) ) {
            echo "<tr>";
            echo "<th>".$date."</th>";	
                echo "<td>".$row[0]." tk"."</td>";
        echo"</tr>";
}
?>
            </table>
        <br><br>
        <h1>-------------------</h1>
        <h4> signature</h4>
            </div>


        </div>
         </body>

   <footer>copyright</footer>

<style type="text/css">
@media print {
    #printbtn {
        display :  none;
    }
}
</style>
<input id ="printbtn" type="button" value="Print this page" onclick="window.print();" >        
 
</html>
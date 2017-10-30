<?php
require_once 'connect.php';
ob_start();
session_start();
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(empty($_SESSION['user_id'])){
        header('Location:loginform.inc.php');
    
    //unset($_SESSION['loggedin']);
}
?>
<?php
if(isset($_SESSION['id_last'])&&!empty($_SESSION['id_last'])){
    $var=$_SESSION['id_last'];
    echo $var;
    unset($_SESSION['id_last']);
}
    
    die();

?>
 <!DOCTYPE html>
        <html>
        <head>
        <style>
        table {
            width:100%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        table#t01 tr:nth-child(even) {
            background-color: #eee;
        }
        table#t01 tr:nth-child(odd) {
           background-color:#fff;
        }
        table#t01 th	{
            background-color: black;
            color: white;
        }
        </style>
        </head>
<div class="table">
     <table id="t01">
        <tr>            
            <th>Order id</th>
              <th>Customer Name</th>
            <th>Product name</th>
              <th>Service Name</th>
            <th>Price</th>
            <th>Date</th>
          </tr>
  echo "<tr>";
     echo "<td>" .$o_id."</td>";
    echo "<td>" .$C_name."</td>";
    echo "<td>" .$category."</td>";
     echo "<td>" .$service."</td>";
    echo "<td>" .$total_price."</td>";
    echo "<td>" .$date."</td>";
    echo"</tr>";
 <div class="table">
     <table id="t02">
        <tr>            
            <th>vat(%)</th>
            <th>Total Price</th>
                        </tr>
     <?php
   echo "<tr>";
     echo "<td>" .$p_vat."</td>";
    echo "<td>".$payment."</td>";
echo "</tr>";
?>
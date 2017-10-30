<?php
require_once 'connect.php';
ob_start();
session_start();
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
            <th>Product name</th>
              <th>Model</th>
            <th>Piece</th>
            <th>Customer Name</th>
            <th>Total price</th>
          </tr>
        echo "<tr>";
     echo "<td>" .$o_id."</td>";
    echo "<td>" .$p_name."</td>";
    echo "<td>" .$p_model."</td>";
     echo "<td>" .$p_piece."</td>";
    echo "<td>" .$p_cn."</td>";
    echo "<td>" .$p_tt."</td>";
    echo"</tr>";
}
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

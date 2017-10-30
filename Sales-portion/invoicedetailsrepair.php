<?php
require_once 'connect.php';
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Repair Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
                 <body bgcolor=" #FFFFC0">

        <header>
        <h1>Invoice in Details</h1>
        </header>

        <nav>
            <div class="submit">
            <form action="repairinvoice.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div>

      </nav>
    
        <section>
        <!DOCTYPE html>
        <html>
        <head>
        <style>
        table {
            width:100%;
        }
        table, th, td {
            border: 2px solid black;
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
            <th>Order Id</th>
              <th>Customer name</th>
            <th>Brand</th>
             <th>Product</th>
              <th>Model</th>
              <th>Price</th>
              <th>Problem</th>
              <th>Date</th>
             </tr>
<?php
//$date=date("Y-m-d");
if(isset($_POST['i_id']) && !empty($_POST['i_id']))
{
    if(isset($_SESSION['brand'])&&!empty($_SESSION['brand'])){
    $vari=$_SESSION['brand'];
        echo $vari;
     unset($_SESSION['brand']);
}
if(isset($_SESSION['model'])&&!empty($_SESSION['model'])){
    $varr=$_SESSION['model'];
    unset($_SESSION['model']);
}
    //echo $varr;
    //echo $vari;
    //die();
    $invoice_id=mysql_real_escape_string($_POST['i_id']);
    
    $query_oid=mysql_query("SELECT `O_id`FROM project.`invoice_details`WHERE project.`invoice_details`.`I_id`='$invoice_id' ");
     while($row = mysql_fetch_array($query_oid,MYSQL_NUM) ) {
        $o_id=$row[0];
         //  echo $o_id;
          $query_odetails=mysql_query("SELECT project.`order`.`O_id`,`O_date`,`Category`,project.`customer`.`C_Fname`,`C_Lname`,project.`order`.`O_model`,project.`order`.`O_price` ,project.`product`.`P_name`FROM project.`order` INNER JOIN project.`customer` ON project.`customer`.`C_id`=project.`order`.`C_id` INNER JOIN project.`product` ON project.`product`.`P_id`=project.`order`.`P_id` WHERE project.`order`.`O_id`='$o_id'");
          while($row=mysql_fetch_array($query_odetails,MYSQL_NUM)){
              $ores=$row[5];
                 $pos_a=strpos($ores,"(");
                 $brand=substr($ores,0,$pos_a);
                $model=substr($ores,($pos_a+1),-1);
            //   $pos_b=strpos($o_res,")");
               //  $model=substr($o_res,0,$pos_b);
             // echo $model;
              $space="  ";
            echo "<tr>";
                 
                 echo "<td>" .$row[0]."</td>";
                 echo "<td>".$row[3].$space.$row[4]."</td>";
                 echo "<td>" .$brand. "</td>";
              echo "<td>" .$row[2]. "</td>";
                echo "<td>" .$model."</td>";
              echo "<td>" .$row[6]." tk"."</td>";
                echo "<td>" .$row[7]."</td>";
              echo "<td>" .$row[1]."</td>";
              
              echo "</tr>";
              }
     }
}
else
{
       $_SESSION['nodata']="nodata";
       header('Location: SalesInvoice.php');
}

?>
            </table>
        </div>
                </body>

        </section>
<footer>
        Admin Panel
        </footer>
</body>
       </html>

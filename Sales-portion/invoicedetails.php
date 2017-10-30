<?php
require_once 'connect.php';
ob_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sales Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
                 <body bgcolor=" #FFFFC0">

        <header>
        <h1>Invoice in Details</h1>
        </header>

        <nav>
            <div class="submit">
            <form action="SalesInvoice.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div>

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
            <th>Product name</th>
             <th>Type</th>
              <th>Model</th>
              <th>Piece</th>
              <th>Price</th>
              <th>Date</th>
             </tr>
<?php
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(empty($_SESSION['user_id'])){
        header('Location:loginform.inc.php');
    
    //unset($_SESSION['loggedin']);
}
//$date=date("Y-m-d");
if(isset($_POST['i_id']) && !empty($_POST['i_id']))
{
    $invoice_id=mysql_real_escape_string($_POST['i_id']);
    
    $query_oid=mysql_query("SELECT `O_id`FROM project.`invoice_details`WHERE project.`invoice_details`.`I_id`='$invoice_id' ");
     while($row = mysql_fetch_array($query_oid,MYSQL_NUM) ) {
        $o_id=$row[0];
         //  echo $o_id;
          $query_odetails=mysql_query("SELECT project.`order`.`O_id`,`O_piece`,`O_date`,`Category`,project.`customer`.`C_Fname`,`C_Lname`,project.`product`.`P_name`,`P_model`,project.`order`.`O_price` FROM project.`order`
          INNER JOIN project.`customer` ON project.`customer`.`C_id`=project.`order`.`C_id`
          INNER JOIN project.`product` ON project.`product`.`P_id`=project.`order`.`P_id`
          WHERE project.`order`.`O_id`='$o_id' ");
          while($row=mysql_fetch_array($query_odetails,MYSQL_NUM)){
              $space="  ";
            echo "<tr>";
                 
                 echo "<td>" .$row[0]."</td>";
                 echo "<td>".$row[4].$space.$row[5]."</td>";
                 echo "<td>" .$row[6]. "</td>";
              echo "<td>" .$row[3]. "</td>";
                echo "<td>" .$row[7]."</td>";
                echo "<td>" .$row[1]."</td>";
              echo "<td>" .$row[8]." tk"."</td>";
                echo "<td>" .$row[2]."</td>";
              
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

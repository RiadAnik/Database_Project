<?php
require_once 'connect.php';
session_start();
?>
<?php
    $result1= mysql_query("SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_piece`,`P_unitprice`,`P_model` FROM project.`categories` INNER JOIN project.`product`ON project.`categories`.`Cat_id`=project.`product`.`Cat_id`WHERE project.`product`.`D_id`='1';");
$query=mysql_query("SELECT `Cat_name`FROM project.`categories`WHERE project.`categories`.`D_id`='1'  ORDER BY  `Cat_id` ");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sales Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <header>
        <h1>PRODUCTS</h1>
        </header>

        <nav>
            <a href="Homepage.php">Homepage</a><br>
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
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
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
        <body>
            <form action="insertproductupdatedata.php">
             piece    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="number" min="1"name="p_piece"><br>
                Price   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="number" min="0" name="p_price"><br>
<div class="table">
        <table id="t01">
            <caption>EDITABLE PRODUCT TABLE</caption>
          <tr>
              <th></th>
            <th>Product Name</th>
            <th>Categories</th>		
            <th>Piece</th>
            <th>UnitPrice</th>
             <th>Model</th>
          </tr>
            <?php
while ($row=mysql_fetch_array($result1,MYSQL_NUM)){
              echo "<tr>";
    echo "<td><input type=\"checkbox\" name=\"select[]\" value=\"$row[0]-$row[4]\" id=\"checkbox\"></td>";
echo "<td>" .$row[1]."</td>";
              echo "<td>" .$row[0]. "</td>";
               echo "<td>" .$row[2]. "</td>";
            echo "<td>" .$row[3]." tk"."</td>";
      echo "<td>" .$row[4]."</td>";
              echo "</tr>";
              }
?>
    

        </table><br>
      <input type="submit" value="UPDATE">
                </div>
               
        </body>

        </section>
           
</form>
        <footer>
        Admin Panel
        </footer>

    </body>
        
</html>

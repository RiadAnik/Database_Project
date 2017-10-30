<?php
require_once 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Repair Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <header>
        <h1>Stored Items</h1>
        </header>

        <nav>
            <form action="RepairSection.php" method="POST"><input type="submit" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
      </nav>
        
<?php
    $result = mysql_query("SELECT `P_name`,`P_unitprice`FROM project.`product`WHERE project.`product`.`Cat_id`='23'  ORDER BY  `Cat_id`  ");

?>
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
        <body>
          
<form action="addrepaircategories.php" method="POST">
    <input type="submit" value="Add New Service">
    <br><br>
            </form>
    <br><br>
    <?php
if(isset($_SESSION['duality'])&&!empty($_SESSION['duality'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>This category is already exists.</strong></p>";
    unset($_SESSION['duality']);
}
    if(isset($_SESSION['insert'])&&!empty($_SESSION['insert'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>New Service is added.</strong></p>";
    unset($_SESSION['insert']);
}
    if(isset($_SESSION['Sorry'])&&!empty($_SESSION['Sorry'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>No category added.Try again.</strong></p>";
    unset($_SESSION['Sorry']);
    }
if(isset($_SESSION['fill'])&&!empty($_SESSION['fill'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Please fill up the requirements.</strong></p>";
    unset($_SESSION['fill']);
}
?>
        <div class="table">
        <table id="t01">
          <tr>
              <th>Customer Name</th>
              <th>Type</th>
              <th>Product name and Model</th>
              <th>Date</th>
          </tr>
            <?php
            while($row=mysql_fetch_array($result,MYSQL_NUM)){
              echo "<tr>";
              echo "<td>" .$row[0]."</td>";
                 echo "<td>" .$row[1]." tk"."</td>";
              echo "</tr>";
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

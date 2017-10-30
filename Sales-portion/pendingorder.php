<?php
require_once 'connect.php';
session_start();
//session_start();
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <header>
        <h1>Pending Order</h1>
        </header>

        <nav>
            <div class="submit">
        <form action="admin.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
</div>

        </nav>
<?php
$result = mysql_query("SELECT project.`order`.`O_id`,`O_piece`,`O_price`,project.`customer`.`C_Fname`,`C_phone`,project.`product`.`P_name`,project.`product`.`P_model`,project.`order`.`Category`FROM project.`order`
INNER JOIN project.`customer` ON project.`customer`.`C_id`=project.`order`.`C_id`
INNER JOIN project.`product` ON project.`product`.`P_id`=project.`order`.`P_id` WHERE project.`order`.`D_id`='1' AND  project.`order`.`status`='pending'  ORDER BY project.`order`.`O_id` DESC ;");
$query_d=mysql_query("SELECT `D_name`FROM project.`department`");
$query_s=mysql_query("SELECT `S_name`FROM project.`salesman`");
$query_p=mysql_query("SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_model`
FROM project.`product`
INNER JOIN project.`categories` ON project.`categories`.`Cat_id`=project.`product`.`Cat_id` 
 WHERE project.`categories`.`D_id`='1'ORDER BY project.`product`.`P_name`");
$query_cu=mysql_query("SELECT project.`customer`.`C_Fname`,`C_phone`FROM project.`customer` WHERE `D_id`='1';");

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
         <body bgcolor=" #FFFFC0" display: flex>

               
            <form action="delete.php" method="post">  <div class="sub"> <input type="submit" style="font-face: 'Comic Sans MS';cursor:pointer; font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Approve&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                </div>
        
               <?php
if(isset($_SESSION['error'])&&!empty($_SESSION['error'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Choose one row Sir.</strong></p>";
    unset($_SESSION['error']);
}
 if(isset($_SESSION['delete'])&&!empty($_SESSION['delete'])){
       echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:55px'>
                               <strong>You have approved it.Delete completed.</strong></p>"; 
                    
    unset($_SESSION['delete']);
}
if(isset($_SESSION['fill'])&&!empty($_SESSION['fill'])){
       echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:55px'>
                               <strong>Check one box which you want to delete.</strong></p>"; 
                    
    unset($_SESSION['fill']);
}
   

             ?>
            <!-- End Loop for Fetch Result -->
               
        <div class="table">
        <table id="t01">
          <tr>
              <th></th>
            <th>Order id</th>
            <th>Product name</th>
              <th>Category</th> 
               <th>Model</th>
              
            <th>Piece</th>
            <th>Customer Name(phone no)</th>
              <th>Total price</th>
          </tr>
            <?php
            while($row=mysql_fetch_array($result,MYSQL_NUM)){
            echo "<tr>";
            echo "<td><input type=\"checkbox\" name=\"select[]\" value=\"$row[0]-$row[1]+$row[5]!$row[6]@#$\" id=\"checkbox\"></td>";
                 
                 echo "<td>" .$row[0]."</td>";
                 echo "<td>".$row[5]."</td>";
                 echo "<td>" .$row[7]. "</td>";
              echo "<td>" .$row[6]. "</td>";
                echo "<td>" .$row[1]."</td>";
                echo "<td>" .$row[3]."(".$row[4].")"."</td>";
                echo "<td>" .$row[2]."</td>";
              echo "</tr>";
              }
 
?>
            
            </table><br>
            
        </body>
             </form>
        </section>
<footer>Admin Panel</footer>
       
</body>
         
        </html>
 
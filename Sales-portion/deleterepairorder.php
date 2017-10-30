<?php
require_once 'connect.php';
//session_start();
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Sales Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <header>
        <h1>DELETE ORDER</h1>
        </header>

        <nav>
            <div class="submit">
                <form action="repairorder.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
</div>

        </nav>
<?php
require_once 'connect.inc.php';
require_once 'core.inc.php';
$num_rec_per_page=10;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
}
else { 
    $page=1; 
} 
$start_from = ($page-1) * $num_rec_per_page; 
if(empty($_SESSION['user_id'])){
        header('Location:loginform.inc.php');
    
    //unset($_SESSION['loggedin']);
}    $result = mysql_query("SELECT project.`order`.`O_id`,project.`customer`.`C_Fname`,`C_phone`,project.`product`.`P_name`,project.`order`.`O_price`,project.`order`.`Category`,`O_date`,`O_model`FROM project.`order`
INNER JOIN project.`customer` ON project.`customer`.`C_id`=project.`order`.`C_id`
INNER JOIN project.`product` ON project.`product`.`P_id`=project.`order`.`P_id` WHERE project.`order`.`D_id`='2'   ORDER BY project.`order`.`O_id` DESC  LIMIT $start_from, $num_rec_per_page ;");
$query_d=mysql_query("SELECT `D_name`FROM project.`department`");
$query_s=mysql_query("SELECT `S_name`FROM project.`salesman`");
$query_p=mysql_query("SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_model`
FROM project.`product`
INNER JOIN project.`categories` ON project.`categories`.`Cat_id`=project.`product`.`Cat_id` 
 WHERE project.`categories`.`D_id`='1'ORDER BY project.`product`.`P_name`");
$query_cu=mysql_query("SELECT project.`customer`.`C_Fname`,`C_phone`FROM project.`customer` WHERE `D_id`='2';");

?>
        <?php
if(isset($_SESSION['error'])&&!empty($_SESSION['error'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Check only one box</strong></p>";
    unset($_SESSION['error']);
}
if(isset($_SESSION['request'])&&!empty($_SESSION['request'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Request send to admin.</strong></p>";
    unset($_SESSION['request']);
}
if(isset($_SESSION['duality'])&&!empty($_SESSION['duality'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>This is in invoice.Select another</strong></p>";
    unset($_SESSION['duality']);
}
if(isset($_SESSION['fill'])&&!empty($_SESSION['fill'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Select one checkbox</strong></p>";
    unset($_SESSION['fill']);
}


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
            <form action="deleterepairorderhidden.php" method="post">  <div class="sub"> <input type="submit" style="font-face: 'Comic Sans MS';cursor:pointer; font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Delete Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                </div>
            
         <!-- End Loop for Fetch Result -->
               
<!--<form action="deleteorderhidden.php" method="post">-->
        <div class="table">
        <table id="t01">
          <tr>
              <th></th>
            <th>Order id</th>
            <th>Customer name(phone no.)</th>
              <th>Service Name</th>
              <th>Price</th>
              <th>Product</th>
              <th>Date</th>
                <th>Brand(Model)</th>

          </tr>
            <?php
            while($row=mysql_fetch_array($result,MYSQL_NUM)){
            echo "<tr>";
          echo "<td><input type=\"radio\" name=\"select[]\" value=\"$row[0]\" id=\"checkbox\"></td>";
                 
                 echo "<td>" .$row[0]."</td>";
                 echo "<td>".$row[1]."(".$row[2].")"."</td>";
                 echo "<td>" .$row[3]. "</td>";
              echo "<td>" .$row[4]." tk". "</td>";
                echo "<td>" .$row[5]."</td>";
                   echo "<td>" .$row[6]."</td>";
                  echo "<td>" .$row[7]."</td>";

              }
 
?>
            
            </table><br>
            <?php
            $sql = "SELECT project.`order`.`O_id`,`O_piece`,`O_price`,project.`customer`.`C_Fname`,`C_phone`,project.`product`.`P_name`,project.`product`.`P_model`,project.`order`.`Category`FROM project.`order`
INNER JOIN project.`customer` ON project.`customer`.`C_id`=project.`order`.`C_id`
INNER JOIN project.`product` ON project.`product`.`P_id`=project.`order`.`P_id` WHERE project.`order`.`D_id`='2'ORDER BY project.`order`.`O_id` DESC"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a class=\"button\"href='deleterepairorder.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a class=\" button\" href='deleterepairorder.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a class=\"button\"href='deleterepairorder.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>
        </body>
             </form>
        </section>
<footer>Admin Panel</footer>
       
</body>
         
        </html>
 
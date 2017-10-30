<?php
require_once 'connect.php';
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(empty($_SESSION['user_id'])){
        header('Location:loginform.inc.php');
    
    //unset($_SESSION['loggedin']);
}
//session_start();
?>
<?php

    //$result1= mysql_query("SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_piece`,`P_unitprice`,`P_model` FROM project.`categories` INNER JOIN project.`product`ON project.`categories`.`Cat_id`=project.`product`.`Cat_id`WHERE project.`product`.`D_id`='1';");
//$query=mysql_query("SELECT `Cat_name`FROM project.`categories`WHERE project.`categories`.`D_id`='1'  ORDER BY  `Cat_id` ");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sales Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <header>
        <h1>Products</h1>
        </header>

        <nav>
            <div class="submit">
        <form action="SalesSection.php" method="POST"><input type="submit" class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
                </div>
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
           background-color: #FFFFC0;
        }
        table#t01 th	{
            background-color: #1A200E;
            color: white;
        }
        

        </style>
        </head>
                 <body bgcolor=" #FFFFC0">
            <form action="#" method="POST"><br>
                 Product name:<input type="text" style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"  name="pname"><br><br>
                <div class="sub"><input type="submit" name="submit" style="font-face: 'Comic Sans MS';cursor:pointer; font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                <br><br></div>
            </form>
            <form action="addproduct.php" method="POST">
             <div class="sub">   <input type="submit" style="font-face: 'Comic Sans MS'; cursor:pointer;font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Add New Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                 </form></div>
<div class="sub"><form action="productupdate.php"><input type="submit" style="font-face: 'Comic Sans MS';cursor:pointer; font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div>
<div class="sub"><form action="deleteproduct.php"><input type="submit" style="font-face: 'Comic Sans MS';cursor:pointer; font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div><br><br>                
 <?php
if(isset($_REQUEST['submit'])){
    $name=$_POST['pname'];
        if(!empty($_REQUEST['submit'])){
    $sql="SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_piece`,`P_unitprice`,`P_model` FROM project.`categories` INNER JOIN project.`product`ON project.`categories`.`Cat_id`=project.`product`.`Cat_id` WHERE (project.`product`.`D_id`='1' AND project.`product`.`status`='active' AND project.`product`.`P_name` like '$name%') OR (project.`product`.`D_id`='1'AND project.`product`.`status`='pending' AND project.`product`.`P_name` like '$name%')";
    $q=mysql_query($sql);
}
}
else{
    $sql="SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_piece`,`P_unitprice`,`P_model` FROM project.`categories` INNER JOIN project.`product`ON project.`categories`.`Cat_id`=project.`product`.`Cat_id`WHERE project.`product`.`D_id`='1'AND project.`product`.`status`='active'OR project.`product`.`status`='pending'";
    $q=mysql_query($sql);
}
?>
  <?php
if(isset($_SESSION['Duality'])&&!empty($_SESSION['Duality'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>This product is already in the database.</strong></p>";
    unset($_SESSION['Duality']);
}
if(isset($_SESSION['added'])&&!empty($_SESSION['added'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>New Product Added.</strong></p>";
    unset($_SESSION['added']);
}
if(isset($_SESSION['Sorry'])&&!empty($_SESSION['Sorry'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>No data added.Try again.</strong></p>";
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
            <th>Product Name</th>
            <th>Categories</th>		
            <th>Piece</th>
            <th>UnitPrice</th>
             <th>Model</th>
          </tr>
            <?php
while ($row=mysql_fetch_array($q,MYSQL_NUM)){
              echo "<tr>";
              echo "<td>" .$row[1]."</td>";
              echo "<td>" .$row[0]. "</td>";
               echo "<td>" .$row[2]. "</td>";
            echo "<td>" .$row[3]." tk"."</td>";
      echo "<td>" .$row[4]."</td>";
               // echo "<td>" .$row[3]."</td>";
                // echo "<td>" .$row[4]."</td>";
                //echo "<td>" .$row[5]."</td>";
                
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

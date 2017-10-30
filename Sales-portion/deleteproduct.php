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
    $result1= mysql_query("SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_piece`,`P_unitprice`,`P_model` FROM project.`categories` INNER JOIN project.`product`ON project.`categories`.`Cat_id`=project.`product`.`Cat_id`WHERE project.`product`.`D_id`='1'AND project.`product`.`status`='active'OR project.`product`.`status`='pending'");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sales Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
             <body bgcolor=" #FFFFC0">

        <header>
        <h1>DELETE PRODUCTS</h1>
        </header>

        <nav>
            
            <div class="submit">
              <form action="product.php" method="POST"><input type="submit"class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
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
           background-color:#fff;
        }
        table#t01 th	{
            background-color: black;
            color: white;
        }
    

        </style>
        </head>
        <body>
            <form action="deleteproducthidden.php" method="POST">
                   <div class="sub"><input type="submit" style="font-face: 'Comic Sans MS'; font-size: medium;cursor:pointer; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"><br><br></div>
                <?php
if(isset($_SESSION['nodata'])&&!empty($_SESSION['nodata'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>No request send to Admin.</strong></p>";
    unset($_SESSION['nodata']);
}
if(isset($_SESSION['request'])&&!empty($_SESSION['request'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Request send to Admin.</strong></p>";
    unset($_SESSION['request']);
}
if(isset($_SESSION['fill'])&&!empty($_SESSION['fill'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Fill up the requirements.</strong></p>";
    unset($_SESSION['fill']);
}
if(isset($_SESSION['zero'])&&!empty($_SESSION['zero'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Product's piece must be zero.You can not choose this.</strong></p>";
    unset($_SESSION['zero']);
}
?>
<div class="table">
        <table id="t01">
            <caption>DELETE PRODUCT TABLE</caption>
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
    echo "<td><input type=\"radio\" name=\"select[]\" value=\"$row[1]-$row[2]@$row[4]++\" id=\"checkbox\"></td>";
echo "<td>" .$row[1]."</td>";
              echo "<td>" .$row[0]. "</td>";
               echo "<td>" .$row[2]. "</td>";
            echo "<td>" .$row[3]." tk"."</td>";
      echo "<td>" .$row[4]."</td>";
              echo "</tr>";
              }
?>
    

        </table><br>
    
                </div>
               
        </body>

        </section>
           
</form>
        <footer>
        Admin Panel
        </footer>

    </body>
        
</html>

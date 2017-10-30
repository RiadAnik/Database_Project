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
//$query=mysql_query("SELECT `Cat_name`FROM project.`categories`WHERE project.`categories`.`D_id`='1'  ORDER BY  `Cat_id` ");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sales Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
             <body bgcolor=" #FFFFC0">

        <header>
        <h1>UPDATE PRODUCTS</h1>
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
            <form action="insertproductupdatedata.php" method="POST">
             Total piece    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="number" min="1"name="piece"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"  ><br><br>
                Unit  Price   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="number" min="0" name="price"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"  ><br><br>
                   <div class="sub"><input type="submit" style="font-face: 'Comic Sans MS'; font-size: medium;cursor:pointer; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"><br><br></div>
                <?php
if(isset($_SESSION['error'])&&!empty($_SESSION['error'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>You can not check more than one checkbox.Checked only one box to edit data.</strong></p>";
    unset($_SESSION['error']);
}
if(isset($_SESSION['fillx'])&&!empty($_SESSION['fillx'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Fill up the requirements for Edit data.</strong></p>";
    unset($_SESSION['fillx']);
}
    if(isset($_SESSION['insert'])&&!empty($_SESSION['insert'])){
       echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:55px'>
                               <strong>Data edited successfully.</strong></p>"; 
    unset($_SESSION['insert']);
}
if(isset($_SESSION['nodata'])&&!empty($_SESSION['nodata'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>No Data edited.Try again</strong></p>";
    unset($_SESSION['nodata']);
}

?>
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
    echo "<td><input type=\"radio\" name=\"select[]\" value=\"$row[1]-$row[4]@\" id=\"checkbox\"></td>";
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

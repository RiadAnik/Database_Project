<?php
require_once 'connect.php';
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(empty($_SESSION['user_id'])){
        header('Location:loginform.inc.php');
    
    //unset($_SESSION['loggedin']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Repair Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <header>
        <h1>Services</h1>
        </header>

        <nav>
            <div class="submit">
            <form action="repaircategories.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div>
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
        <body bgcolor=" #FFFFC0">
          
<form action="addrepaircategories.php" method="POST">
    Service Name  : <input type="text" name="s_n"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"  ><br><br>
price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="number" min="0" select name="s_p"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey" ><br><br>
   
<div class="sub"><input type="submit" style="font-face: 'Comic Sans MS'; font-size: medium;cursor:pointer; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Add New Service&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
    </div><br><br>
            </form>
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
              <th>Services</th>
              <th>Price</th>
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

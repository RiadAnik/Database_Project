<?php
require_once 'connect.php';
//session_start();
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
            <div class="submit"><form action="RepairSection.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div>
      </nav>
        
<?php

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
          <form action="#" method="POST"><br>
                 Service name:<input type="text" name="fname"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"><br><br>
                <div class="sub"><input type="submit" name="submit"style="font-face: 'Comic Sans MS';cursor:pointer; font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
              </div>   </form><br><br><br>
<form action="addrepairservices.php" method="POST">
<div class="sub"><input type="submit" style="font-face: 'Comic Sans MS';cursor:pointer; font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add New Service&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></div>
            </form>
            <form action="repairproductupdate.php"><div class="sub"><input type="submit" style="font-face: 'Comic Sans MS';cursor:pointer; font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Update Service Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></div></form>
              
    <br><br>
              <?php
              if(isset($_REQUEST['submit'])){
    $name=$_POST['fname'];
    if(!empty($_REQUEST['submit']))
    {
    $sql=" SELECT `P_name`,`P_unitprice`FROM project.`product`WHERE project.`product`.`Cat_id`='23'    AND `P_name` like '$name%'  ORDER BY  `Cat_id`";
    $q=mysql_query($sql);
    }
}
else{
    $sql=" SELECT `P_name`,`P_unitprice`FROM project.`product`WHERE project.`product`.`Cat_id`='23'    ORDER BY  `Cat_id`";
    $q=mysql_query($sql);
}

            ?>

    <div class="table">
        <table id="t01">
          <tr>
              <th>Services</th>
              <th>Price</th>
          </tr>
            <?php
            while($row=mysql_fetch_array($q,MYSQL_NUM)){
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

<?php
require_once 'connect.php';
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(empty($_SESSION['user_id'])){
        header('Location:loginform.inc.php');
    
    //unset($_SESSION['loggedin']);
}
?>
<?php

    $result1= mysql_query("SELECT `C_Fname`,`C_Lname`,`C_email`,`C_phone` FROM project.`customer` WHERE `D_id`='1';");
$query=mysql_query("SELECT `D_name`FROM project.`department`");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sales Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <header>
        <h1>Add New Customer</h1>
        </header>

        <nav>
        <div class="submit">
             <form action="Customer.php" method="POST"><input type="submit" class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div>


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
        <body bgcolor=" #FFFFC0">
                      <form action="addCustomerpage.php" method="POST"><br>

                First name : <input type="text" name="c_fn" style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"><br><br>
                Last name    : <input type="text" name="c_ln" style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"><br><br>
                Email   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="email" name="c_m"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"><br><br>
                phone   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="text" name="c_p"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"><br><br>
              <div class="sub"> <input type="submit" style="font-face: 'Comic Sans MS'; font-size: medium; color: white;cursor:pointer; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Add New Customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></div> 
    <br><br>
<?php
if(isset($_SESSION['duality'])&&!empty($_SESSION['duality'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>The customer is already in the database.</strong></p>";
    unset($_SESSION['duality']);
}
if(isset($_SESSION['added'])&&!empty($_SESSION['added'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>New data added</strong></p>";
    unset($_SESSION['added']);
}
if(isset($_SESSION['nodata'])&&!empty($_SESSION['nodata'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>No data added.Try again.</strong></p>";
    unset($_SESSION['nodata']);
}
if(isset($_SESSION['fill'])&&!empty($_SESSION['fill'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Fill up the requirements</strong></p>";
    unset($_SESSION['fill']);
}
?>
    
  <div class="table">
        <table id="t01">
          <tr>
            <th>Fast name</th>		
            <th>Last name</th>
             <th>Email</th>
              <th>Phone</th>
             </tr>
            <?php
while ($row=mysql_fetch_array($result1,MYSQL_NUM)){
              echo "<tr>";
                 echo "<td>" .$row[0]. "</td>";
               echo "<td>" .$row[1]. "</td>";
            echo "<td>" .$row[2]."</td>";
       echo "<td>" .$row[3]."</td>";
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

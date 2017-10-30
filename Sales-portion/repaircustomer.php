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
<?php
    //$result1= mysql_query("SELECT `C_Fname`,`C_Lname`,`C_email`,`C_phone` FROM project.`customer` WHERE `D_id`='2';");
//$query=mysql_query("SELECT `D_name`FROM project.`department`");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Repair Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body bgcolor=" #FFFFC0">

        <header>
        <h1>Repair Customer</h1>
        </header>

        <nav>
        
     <div class="submit"><form action="RepairSection.php" method="POST"><input type="submit" class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div>


        </nav>

        <section>
        <!DOCTYPE html>
        <html>
        <head>
        <style>
        
.cat{
     cursor: pointer;    
        font-weight:bold;
         }
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
                <form action="#" method="POST"><br>
                 First name:<input type="text" name="fname"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"><br><br>
             <div class="sub">   <input type="submit" name="submit"style="font-face: 'Comic Sans MS'; font-size: medium;cursor:pointer; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;"></div>
                <br><br>
            </form>
        
                      <form action="addrepaircustomerdata.php" method="POST"><br>
                <div class="sub"><input type="submit" style="font-face: 'Comic Sans MS'; font-size: medium;cursor:pointer; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add New Customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div>
    <br><br>
                        <?php

if(isset($_REQUEST['submit'])){
    $name=$_POST['fname'];
    if(!empty($_REQUEST['submit']))
    {
    $sql=" SELECT `C_Fname`,`C_Lname`,`C_email`,`C_phone` FROM project.`customer` WHERE `D_id`='2' AND `C_Fname` like '$name%' ";
    $q=mysql_query($sql);
    }
}
else{
    $sql="SELECT `C_Fname`,`C_Lname`,`C_email`,`C_phone` FROM project.`customer` WHERE `D_id`='2'";
    $q=mysql_query($sql);
}
?>
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
while ($row=mysql_fetch_array($q,MYSQL_NUM)){
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

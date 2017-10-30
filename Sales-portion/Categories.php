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
        <title>Sales Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <header>
        <h1>Categories</h1>
        </header>

        <nav>
            <div class="submit">
            <form action="SalesSection.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div>
      </nav>
        
<?php
    $result = mysql_query("SELECT `Cat_name`FROM project.`categories`WHERE project.`categories`.`D_id`='1'  ORDER BY  `Cat_id`  ");

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
          
<form action="addcategory.php" method="POST"><br>
Category  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey" pattern="[a-zA-Z0-9\s]+" title="The name must in A-Z a-z 0-9 format"name="cat_name" id="ctext">
    <script>
window.onload = function() {
  document.getElementById("ctext").focus();
};
    </script><br>
    <br>
  <div class="sub"> <input type="submit" style="font-face: 'Comic Sans MS'; font-size: medium;cursor:pointer; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Add New Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div> 
           
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
                               <strong>New category in added.</strong></p>";
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
              <th>Categories</th>
          </tr>
<?php
            while($row=mysql_fetch_array($result,MYSQL_NUM)){
              echo "<tr>";
              echo "<td>" .$row[0]."</td>";
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

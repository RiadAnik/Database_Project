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
$num_rec_per_page=10;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
}
else { 
    $page=1; 
} 
$start_from = ($page-1) * $num_rec_per_page; 
    $result1= mysql_query("SELECT project.`customer`.`C_Fname`,`C_Lname`,project.`invoice`.`I_id`,`I_totalcost`,project.`salesman`.`S_name`,`status` FROM project.`invoice` INNER JOIN project.`customer` ON project.`customer`.`C_id`=project.`invoice`.`C_id` INNER JOIN project.`salesman` ON project.`salesman`.`S_id`=project.`invoice`.`S_id` WHERE project.`invoice`.`D_id`='2' ORDER BY project.`invoice`.`I_id`LIMIT $start_from, $num_rec_per_page;;
");
$query_iid=mysql_query("SELECT project.`invoice`.`I_id`FROM project.`invoice` WHERE project.`invoice`.`D_id`='2' ORDER BY project.`invoice`.`I_id`");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sales Section</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body bgcolor=" #FFFFC0">
        <header>
        <h1>Invoice</h1>
        </header>

        <nav>
   <div class="submit"> <form action="RepairSection.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></div></form>



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
             <form action="invoicedetailsrepair.php" method="POST"><br>
                Invoice Id : <select name="i_id"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey" ><option disabled selected style='display: none;'> Invoice id.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 </option>
            <!-- Loop For Fetch Result -->        
            <?php 
while($row = mysql_fetch_array($query_iid,MYSQL_NUM) ) : 
                ?>
            
                 <?php 
print  '<option >'.$row[0].'</option>';
?>
            <?php endwhile; ?> 
            <!-- End Loop for Fetch Result -->
    </select><br><br>
                 <div class="sub"><input type="submit" style="font-face: 'Comic Sans MS'; font-size: medium;cursor:pointer; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Show Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></div>
    <br><br>
            </form>
            <?php
if(isset($_SESSION['nodata'])&&!empty($_SESSION['nodata'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Fill up the requirements</strong></p>";
    unset($_SESSION['nodata']);
}
?>
        <div class="table">
        <table id="t01">
          <tr>
            
            <th>Invoice no</th>		
            <th>Customer name</th>
            <th>Total price</th>
            <th>Repairman</th>
             
          </tr>
            <?php
while ($row=mysql_fetch_array($result1,MYSQL_NUM)){
              echo "<tr>";
              
              echo "<td>" .$row[2]. "</td>";
               echo "<td>" .$row[0]." ".$row[1]. "</td>";
           
       echo "<td>" .$row[3]." tk"."</td>";
                   echo "<td>" .$row[4]."(".$row[5].")" ."</td>";
              echo "</tr>";
              }
?>
                </table><br>
            <?php
$sql = "SELECT project.`customer`.`C_Fname`,`C_Lname`,project.`invoice`.`I_id`,`I_totalcost` FROM project.`invoice` INNER JOIN project.`customer` ON project.`customer`.`C_id`=project.`invoice`.`C_id` WHERE project.`invoice`.`D_id`='2'ORDER BY project.`invoice`.`I_id`"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a class=\"button\"href='repairinvoice.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a class=\" button\" href='repairinvoice.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a class=\"button\"href='repairinvoice.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>
        </div>

        </body>

        </section>

        <footer>
        Admin Panel
        </footer>

    </body>
        
</html>

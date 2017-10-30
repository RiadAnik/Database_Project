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
    <style>
        
        .right{
             -webkit-transition: width 2s,height 3s; /* For Safari 3.1 to 6.0 */
    transition: width 2s,height 3s;
    width:300px;
    float:right;
    padding:10px;
        }
        </style>
        <header>
        <h1>ORDER</h1>
        </header>

        <nav>
            <div class="submit">
        <form action="SalesSection.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
</div>

        </nav>
<?php
require_once 'connect.inc.php';
require_once 'core.inc.php';
$num_rec_per_page=3;
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
}    $result = mysql_query("SELECT project.`order`.`O_id`,`O_piece`,`O_price`,project.`customer`.`C_Fname`,`C_phone`,project.`product`.`P_name`,project.`product`.`P_model`,project.`order`.`Category`FROM project.`order`
INNER JOIN project.`customer` ON project.`customer`.`C_id`=project.`order`.`C_id`
INNER JOIN project.`product` ON project.`product`.`P_id`=project.`order`.`P_id` WHERE project.`order`.`D_id`='1'ORDER BY project.`order`.`O_id` DESC LIMIT $start_from, $num_rec_per_page;");
$query_d=mysql_query("SELECT `D_name`FROM project.`department`");
$query_s=mysql_query("SELECT `S_name`FROM project.`salesman`WHERE `status`='active'");
$query_p=mysql_query("SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_model`
FROM project.`product`
INNER JOIN project.`categories` ON project.`categories`.`Cat_id`=project.`product`.`Cat_id` 
 WHERE project.`categories`.`D_id`='1'ORDER BY project.`product`.`P_name`");
$query_cu=mysql_query("SELECT project.`customer`.`C_Fname`,`C_phone`FROM project.`customer` WHERE `D_id`='1' ORDER BY `C_id` DESC;");

?>
        <div class="right">
        <form action="deleteorder.php">  <div class="sub"> <input type="submit" style="font-face: 'Comic Sans MS';cursor:pointer; font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Delete Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
            </div>
                </div>
            </form>
        <section>
        <!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pagination</title>
<link href="style.css" rel="stylesheet" type="text/css" />
            </head>
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
         <body bgcolor=" #FFFFC0" display: flex>
           <form action="addorder.php" method="POST"><br>

                Product name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<select name="o_pn"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"  >
               <option disabled selected style='display: none;'>Product name(category[model])
      
            <!-- Loop For Fetch Result -->        
            <?php 
while($row = mysql_fetch_array($query_p,MYSQL_NUM) ) : 
                ?>
            
                 <?php 
print  '<option >'.$row[1].'('.$row[0].'['.$row[2].']'.')'.'</option>';
?>
            <?php endwhile; ?> 
            <!-- End Loop for Fetch Result -->
    </select><br><br>
                
 Customer Name &nbsp;&nbsp;&nbsp;&nbsp;:<select name="o_cn" style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey" >
        
               <option disabled selected style='display: none;'>Customer name(Phone no.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- Loop For Fetch Result -->        
            <?php 
while($row = mysql_fetch_array($query_cu,MYSQL_NUM) ) :
                ?>
            
                 <?php 
print  '<option >'.$row[0].'('.$row[1].')'.'</option>';
?>
                  <?php endwhile; ?> 
            <!-- End Loop for Fetch Result -->
    </select><br><br>
     Piece &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:<input type="number"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"  min="1"name="o_p"><br><br>
           <div class="sub"> <input type="submit" style="font-face: 'Comic Sans MS';cursor:pointer; font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Add New Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
               <br><br></div></form>
            
               <?php
if(isset($_SESSION['dualitys'])&&!empty($_SESSION['dualitys'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>This is already used in an invoice.You can not choose it again.</strong></p>";
    unset($_SESSION['dualitys']);
}
 if(isset($_SESSION['duality'])&&!empty($_SESSION['duality'])){
       echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:55px'>
                               <strong>This is already in an invoice.</strong></p>"; 
                    
    unset($_SESSION['duality']);
}
    if(isset($_SESSION['new'])&&!empty($_SESSION['new'])){
       echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:55px'>
                               <strong>New Data added.</strong></p>"; 
    unset($_SESSION['new']);
}
if(isset($_SESSION['sorry'])&&!empty($_SESSION['sorry'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>No Data added.Try again</strong></p>";
    unset($_SESSION['sorry']);
}
if(isset($_SESSION['fill'])&&!empty($_SESSION['fill'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Fill up the requirements for creating a valid order.</strong></p>";
    unset($_SESSION['fill']);
}
if(isset($_SESSION['fillx'])&&!empty($_SESSION['fillx'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Fill up the requirements for Creating invoice.</strong></p>";
    unset($_SESSION['fillx']);
}

 if(isset($_SESSION['try'])&&!empty($_SESSION['try'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Select the order for creating the invoice.</strong></p>";
    unset($_SESSION['try']);
}
if(isset($_SESSION['nopiece'])&&!empty($_SESSION['nopiece'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>This amout of product in not avaiable.</strong></p>";
    unset($_SESSION['nopiece']);
}
if(isset($_SESSION['notsame'])&&!empty($_SESSION['notsame'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>You have to select orders of one customer to create invoice .</strong></p>";
    unset($_SESSION['notsame']);
}
             ?>
            <!-- End Loop for Fetch Result -->
               
<form action="submit.php" target="_blank" method="post">
      <div class="table">
        <table id="t01">
          <tr>
              <th></th>
            <th>Order id</th>
            <th>Product name</th>
              <th>Category</th> 
               <th>Model</th>
              
            <th>Piece</th>
            <th>Customer Name(phone no)</th>
              <th>Total price</th>
          </tr>
   
      
          <?php
            while($row=mysql_fetch_array($result,MYSQL_NUM)){
            echo "<tr>";
            echo "<td><input type=\"checkbox\" name=\"select[]\" value=\"$row[0]-$row[5]=$row[6]*$row[1]+$row[3]!$row[4]@$row[2]#@{[[[\" id=\"checkbox\"></td>";
                 
                 echo "<td>" .$row[0]."</td>";
                 echo "<td>".$row[5]."</td>";
                 echo "<td>" .$row[7]. "</td>";
              echo "<td>" .$row[6]. "</td>";
                echo "<td>" .$row[1]."</td>";
                echo "<td>" .$row[3]."(".$row[4].")"."</td>";
                echo "<td>" .$row[2]."</td>";
              echo "</tr>";
              }
 
?>
            </table><br>
    <?php
$sql = "SELECT project.`order`.`O_id`,`O_piece`,`O_price`,project.`customer`.`C_Fname`,`C_phone`,project.`product`.`P_name`,project.`product`.`P_model`,project.`order`.`Category`FROM project.`order`
INNER JOIN project.`customer` ON project.`customer`.`C_id`=project.`order`.`C_id`
INNER JOIN project.`product` ON project.`product`.`P_id`=project.`order`.`P_id` WHERE project.`order`.`D_id`='1'ORDER BY project.`order`.`O_id` DESC"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a class=\"button\"href='order.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a class=\" button\" href='order.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a class=\"button\"href='order.php?page=$total_pages'>".'>|'."</a> "; // Goto last page

?><br><br>
              Vat(%): <input type="number"style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"  min="0" name="vat" title="Vat must be in positive number" />Salesman: <select name="sales_man"  style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey" >
      <option disabled selected style='display: none;'>Salesman name.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
            <?php 
while($row = mysql_fetch_array($query_s,MYSQL_NUM) ) : 
                ?>
             <option  >
                 <?php 
echo($row[0]);
?></option>
            <?php endwhile; ?> 
            <!-- End Loop for Fetch Result -->
    </select><br><br><div class="sub"> <input type="submit" target="_blank" style="font-face: 'Comic Sans MS'; font-size: medium;cursor:pointer; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Create Invoice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"> </div>
           
              </form>
        </div>
        </body>

        </section>
<footer>Admin Panel</footer>
       
</body>
         
        </html>
 
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
 
$query=mysql_query("SELECT `Cat_name`FROM project.`categories`WHERE project.`categories`.`D_id`='1'  ORDER BY  `Cat_id` ");
?>

<!DOCTYPE html>
<html>
<head>
<style>
header {
    background-color:#1A200E;
    color:white;
    text-align:center;
    padding:5px;	 
}
    .submit {
/*    width: 100px;*/
/*height: 100px;*/
    -webkit-transition: width 2s; /* For Safari 3.1 to 6.0 */
    transition: width 2s;
    
}
.sub{
    -webkit-transition: width 2s,height 3s; /* For Safari 3.1 to 6.0 */
    transition: width 2s,height 3s;
}
nav {
    line-height:30px;
    background-color:#667A44;
    height:520px;
    width:120px;
    float:left;
    padding:5px;	      
}
    .submit :hover{
         width: 120px;
    }
  .sub :hover{
         width: 200px;
      height:30px;
    }
section {
    width:350px;
    float:left;
    padding:10px;	 	 
}
    .cat{
     cursor: pointer;    
        font-weight:bold;
         }
    
footer {
    background-color:#1A200E;
    color:white;
    clear:both;
    text-align:center;
    padding:5px;	 	 
}
</style>
</head>
<body bgcolor="#E6E6FA">

<header>
<h1>Sales Section</h1>
</header>

<nav>
    <div class="submit">
  <form action="Categories.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="Categories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
     <form action="product.php" method="POST"><input type="submit"  class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
    <form action="Customer.php" method="POST"><input type="submit"  class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="Customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
    <form action="order.php" method="POST"><input type="submit" class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
    <form action="SalesInvoice.php" method="POST"><input type="submit"  class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="Invoice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
    <form action="Homepage.php" method="POST"><input type="submit" class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="Homepage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
    </div>
</nav>

<section>
    <form action="countcategory.php" method="post">
Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <select name="p_cat" style="font-face: 'Comic Sans MS'; font-size: small; color: teal; background-color:#FFFFC0 ; border: 1pt ridge lightgrey" > <option disabled selected style='display: none;'>Category name.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
            <!-- Loop For Fetch Result -->        
            <?php 
while($row = mysql_fetch_array($query,MYSQL_NUM) ) : 
                ?>
             <option  >
                 <?php 
echo($row[0]);
?></option>
            <?php endwhile; ?> 
            <!-- End Loop for Fetch Result -->
    </select><br><br>
        <div class="sub">
        <input type="submit" style="font-face: 'Comic Sans MS';  cursor: pointer; font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;See total piece&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
            </form><br><br></div>
    <form action="countsalary.php" method="post">
   Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="date" name="s_date"style="font-face: 'Comic Sans MS'; font-size: medium; color: teal; background-color:#FFFFC0 ; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"><br><br>
        <div class="sub">  <input type="submit" style="font-face: 'Comic Sans MS'; font-size: medium; cursor: pointer;  color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;See daily income&nbsp;&nbsp;&nbsp;&nbsp;"><br><br>
            </form></div>
    <form action="countmonthly.php" method="post">
   Month&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="month" name="s_month"style="font-face: 'Comic Sans MS'; font-size: medium; color: teal; background-color:#FFFFC0 ; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"><br><br>
          <div class="sub"><input type="submit" style="font-face: 'Comic Sans MS'; cursor: pointer;  font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;See monthly income&nbsp;">
    </form>
        </div>
<?php
if(isset($_SESSION['total'])&&isset($_SESSION['c'])&&!empty($_SESSION['total'])&&!empty($_SESSION['c'])){
    $var=$_SESSION['total'];
    $c=$_SESSION['c'];
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>You have total $var piece of $c.</strong></p>";
    unset($_SESSION['total']);
}
if(isset($_SESSION['fill'])&&!empty($_SESSION['fill'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Select a category name.</strong></p>";
    unset($_SESSION['fill']);
}
if(isset($_SESSION['zero'])&&isset($_SESSION['c'])&&!empty($_SESSION['zero'])&&!empty($_SESSION['c'])){
    $c=$_SESSION['c'];
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>You have 0 piece of $c.</strong></p>";
    unset($_SESSION['zero']);
}
if(isset($_SESSION['t'])&&isset($_SESSION['pcat'])&&!empty($_SESSION['t'])&&!empty($_SESSION['pcat'])){
    $var=$_SESSION['t'];
      $d=$_SESSION['pcat'];
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Your income is $var Taka in $d.</strong></p>";
    unset($_SESSION['t']);
}
if(isset($_SESSION['none'])&&isset($_SESSION['pcat'])&&!empty($_SESSION['none'])&&!empty($_SESSION['pcat'])){
     $d=$_SESSION['pcat'];
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Your income is 0 Taka in $d.</strong></p>";
    unset($_SESSION['none']);
}
if(isset($_SESSION['fillx'])&&!empty($_SESSION['fillx'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Select a date first.</strong></p>";
    unset($_SESSION['fillx']);
}
if(isset($_SESSION['fills'])&&!empty($_SESSION['fills'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Select a month first.</strong></p>";
    unset($_SESSION['fills']);
}
if(isset($_SESSION['no'])&&isset($_SESSION['pcat'])&&!empty($_SESSION['no'])&&!empty($_SESSION['pcat'])){
      $d=$_SESSION['pcat'];
     $time=strtotime($d);
$montho=date("F",$time);
$yearo=date("Y",$time);
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Your income is 0 Taka in $montho,$yearo.</strong></p>";
    unset($_SESSION['no']);
}
if(isset($_SESSION['tt'])&&isset($_SESSION['pcat'])&&!empty($_SESSION['tt'])&&!empty($_SESSION['pcat'])){
    $var=$_SESSION['tt'];
     $d=$_SESSION['pcat'];
    $time=strtotime($d);
$montho=date("F",$time);
$yearo=date("Y",$time);
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Your income is $var Taka in $montho,$yearo.</strong></p>";
    unset($_SESSION['tt']);
}

?>
</section>

<footer>
Admin Panel
</footer>

</body>
</html>

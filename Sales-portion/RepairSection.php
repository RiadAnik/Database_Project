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
    <link rel="stylesheet" href="style.css">
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
 .submit :hover{
         width: 120px;
    }
    .cat{
     cursor: pointer;    
        font-weight:bold;
         }
    
nav {
    line-height:30px;
    background-color:#667A44;
    height:530px;
    width:120px;
    float:left;
    padding:5px;	      
}
section {
    width:350px;
    float:left;
    padding:10px;	 	 
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
<h1>Repair Section</h1>
</header>

<nav>
    <div class="submit">
   <form action="repaircategories.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Service&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
     <form action="repaircustomer.php" method="POST"><input type="submit" class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Customer&nbsp;&nbsp;&nbsp;"></form>
     <form action="repairorder.php" method="POST"><input type="submit" class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
     <form action="repairinvoice.php" method="POST"><input type="submit" class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invoice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form>
     <form action="Homepage.php" method="POST"><input type="submit" class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;Homepage&nbsp;&nbsp;&nbsp;"></form>
</div></nav><br>
    <form action="countrepairsalary.php" method="post">
   Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="date" name="s_date"style="font-face: 'Comic Sans MS'; font-size: medium; color: teal; background-color:#FFFFC0 ; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"><br><br>
        <div class="sub">  <input type="submit" style="font-face: 'Comic Sans MS'; font-size: medium; cursor: pointer;  color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;See daily income&nbsp;&nbsp;&nbsp;&nbsp;"><br><br>
            </form></div>
    <form action="countrepairmonthly.php" method="post">
   Month&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="month" name="s_month"style="font-face: 'Comic Sans MS'; font-size: medium; color: teal; background-color:#FFFFC0 ; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"><br><br>
          <div class="sub"><input type="submit" style="font-face: 'Comic Sans MS'; cursor: pointer;  font-size: medium; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;See monthly income&nbsp;">
    </form>
        </div>
<?php

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

<section>

</section>

<footer>
Admin Panel
</footer>

</body>
</html>

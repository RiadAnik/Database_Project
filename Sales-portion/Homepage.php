<?php
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
    <title>Homepage</title>
<style>
header {
    background-color:#1A200E;
    color:white;
    text-align:center;
    padding:5px;	 
}
    .cat{
     cursor: pointer;    
        font-weight:bold;
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
nav {
    line-height:30px;
    background-color:#667A44;
    height:520px;
    width:120px;
    float:left;
    padding:5px;	      
}
section {
    width:680px;
    float:left;
    padding:10px;
    text-align:right;
}
footer {
    background-color:#1A200E;
    color:white;
    clear:both;
    text-align:center;
    padding:5px;	 	 
}
 h3:hover {
     font-size: 150%;
      font-weight:bold;
/*     text-color: green;*/
}
</style>
</head>
<body>

<header>
<h1>IT MART</h1>
</header>

<nav>
    <div class="submit">
     <form action="SalesSection.php" method="POST"><input type="submit"class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="Sales Section&nbsp;"></form>
     <form action="RepairSection.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="Repair Section"></form>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
         <form action="logout.php" method="POST"><input type="submit"class="cat" style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
        </form>
       
    </div>
  
</nav>



<body bgcolor="#E6E6FA">
    <section>
    <h3> Welcome To IT_MART!!!!!!</h3>
    </section>

    </body>
<footer>
Admin Panel
</footer>

</body>
</html>

<?php
require_once 'core.inc.php';
require_once 'connect.inc.php';
if(empty($_SESSION['user_id'])){
        header('Location:index.php');
    
    //unset($_SESSION['loggedin']);
} 
?>
<?php
$result = mysql_query("SELECT project.`order`.`O_id`,project.`customer`.`C_Fname`,`C_phone`,project.`product`.`P_name`,project.`order`.`O_price`,project.`order`.`Category`,`O_date`,`O_model`FROM project.`order`
INNER JOIN project.`customer` ON project.`customer`.`C_id`=project.`order`.`C_id`
INNER JOIN project.`product` ON project.`product`.`P_id`=project.`order`.`P_id` WHERE project.`order`.`D_id`='2' AND  project.`order`.`status`='pending'  ORDER BY project.`order`.`O_id` DESC ;");
$query_d=mysql_query("SELECT `D_name`FROM project.`department`");
$query_s=mysql_query("SELECT `S_name`FROM project.`salesman`");
$query_p=mysql_query("SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_model`
FROM project.`product`
INNER JOIN project.`categories` ON project.`categories`.`Cat_id`=project.`product`.`Cat_id` 
 WHERE project.`categories`.`D_id`='1'ORDER BY project.`product`.`P_name`");
$query_cu=mysql_query("SELECT project.`customer`.`C_Fname`,`C_phone`FROM project.`customer` WHERE `D_id`='2';");

?>

<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT_MART</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="admi.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body >
     <!-------------------header & Navbar div-------------------->
    <div class="row header container-fluid">
        <div class="col-md-3">
            <img src="logo.png" alt="IT_MART">
        </div>
         <div class="col-md-9">
             <p class="navbar-text">Signed in as Admin</p>
            </div>
    </div>     
    
    <div class="container-fluid row section">
            <div class ="col-md-3 sidebar">
             <ul class="nav nav-pills nav-stacked">
                 <li role="presentation" ><a href="admino.php">Dashboard
                      </a></li>
                 <li role="presentation"><a href="porder.php">Pending Delete Order(Sales)</a></li>
                 <li role="presentation" class="active"><a href="prorder.php">Pending Delete Order(Repair)</a></li>
                 <li role="presentation" ><a href="product.php">Product</a></li>
                   <li role="presentation" ><a href="salesman.php">Salesman</a></li><br><br><br><br>
                   <li role="presentation" ><a href="logout.php">Logout</a></li>
                 
            </ul>           
        </div>
        <div class="col-md-9 content" >
           
                <form action="deleter.php" method="post">
                     <div class="col-md-12 content" >
                     <div class="row">
                <button type="submit" class="btn btn-danger btn-lg">
                    <span class="glyphicon glyphicon-remove" ></span>
                        DELETE</button>
            </div>
    <?php
if(isset($_SESSION['error'])&&!empty($_SESSION['error'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:10px'>
                               <strong>Choose one row Sir.</strong></p>";
    unset($_SESSION['error']);
}
 if(isset($_SESSION['delete'])&&!empty($_SESSION['delete'])){
       echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:55px'>
                               <strong>You have approved it.Delete completed.</strong></p>"; 
                    
    unset($_SESSION['delete']);
}
if(isset($_SESSION['fill'])&&!empty($_SESSION['fill'])){
       echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:55px'>
                               <strong>Check one box which you want to delete.</strong></p>"; 
                    
    unset($_SESSION['fill']);
}
   

             ?>
                     <table class="table table-striped">
    <thead>
      <tr >
          <th></th>
            <th>Order id</th>
            <th>Customer name(phone no.)</th>
              <th>Service Name</th>
              <th>Price</th>
              <th>Product</th>
              <th>Date</th>
                <th>Brand(Model)</th>

      </tr>
    </thead>
    <tbody>
    <?php
            while($row=mysql_fetch_array($result,MYSQL_NUM)){
                echo "<tr>";
            echo "<td><input type=\"checkbox\" name=\"select[]\" value=\"$row[0]-$row[1]=$row[2]*$row[3]+$row[4]!$row[5]@$row[6]^$row[7]#%@{[[[\" id=\"checkbox\"></td>";
                 
                 echo "<td>" .$row[0]."</td>";
                 echo "<td>".$row[1]."(".$row[2].")"."</td>";
                 echo "<td>" .$row[3]. "</td>";
              echo "<td>" .$row[4]." tk". "</td>";
                echo "<td>" .$row[5]."</td>";
                   echo "<td>" .$row[6]."</td>";
                  echo "<td>" .$row[7]."</td>";
              }
 
?>
        
    </tbody>
  </table>
                </form>
</div>

            </div>
        <!------------------------end Content----------------------->
    </div>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

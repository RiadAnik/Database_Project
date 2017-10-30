<?php
require_once 'core.inc.php';
require_once 'connect.inc.php';
if(empty($_SESSION['user_id'])){
        header('Location:verticalnavbar.php');
    
    //unset($_SESSION['loggedin']);
} 
?>
<?php
    $result = mysql_query("SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_piece`,`P_unitprice`,`P_model` FROM project.`categories` INNER JOIN project.`product`ON project.`categories`.`Cat_id`=project.`product`.`Cat_id`WHERE project.`product`.`D_id`='1' AND project.`product`.`status`='pending'  ");
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
             <p class="navbar-text">Signed in as Admin
             
             </p>
            </div>
    </div>     
    
    <div class="container-fluid row section">
            <div class ="col-md-3 sidebar">
             <ul class="nav nav-pills nav-stacked">
                 <li role="presentation" ><a href="admino.php">Dashboard
                      </a></li>
                 <li role="presentation" ><a href="porder.php">Pending Delete Order(Sales)</a></li>
                  <li role="presentation"><a href="prorder.php">Pending Delete Order(Repair)</a></li>
                 <li role="presentation" class="active" ><a href="product.php">Product</a></li>
                   <li role="presentation" ><a href="salesman.php">Salesman</a></li><br><br><br><br>
                   <li role="presentation" ><a href="logout.php">Logout</a></li>
                 
            </ul>           
        </div>
        <div class="col-md-9 content" >
                   <div class="col-md-12 content">
       
                        <form role="form" action="producthistory.php" method="POST">
                         <button type="submit" class="btn btn-success btn-lg" >
                    <span class="glyphicon glyphicon-wrench" ></span>
                             History</button></form>
      
    <?php
if(isset($_SESSION['fill'])&&!empty($_SESSION['fill'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Please fill up the requirements.</strong></p>";
    unset($_SESSION['fill']);
}
if(isset($_SESSION['error'])&&!empty($_SESSION['error'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Select only one checkbox.</strong></p>";
    unset($_SESSION['error']);
}
if(isset($_SESSION['inactive'])&&!empty($_SESSION['inactive'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong> Deleted successfully.</strong></p>";
    unset($_SESSION['inactive']);
}
if(isset($_SESSION['active'])&&!empty($_SESSION['active'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>This product is ready for sale.</strong></p>";
    unset($_SESSION['active']);
}

if(isset($_SESSION['fillx'])&&!empty($_SESSION['fillx'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Please Check one box which you want to delete.</strong></p>";
    unset($_SESSION['fillx']);
}


?>
                     <table class="table table-striped">
    <thead>
      <tr >
         <th>Checkbox</th>
            <th>Brand</th>
            <th>Product</th>		
            <th>UnitPrice</th>
             <th>Model</th>
      </tr>
    </thead>
    <tbody>
        <form action="deleteproduct.php" method="post">
    <?php
            while($row=mysql_fetch_array($result,MYSQL_NUM)){
                echo "<tr>";
            echo "<td><input type=\"radio\" name=\"select[]\" value=\"$row[1]-$row[4]+\" id=\"checkbox\"></td>";
           echo "<td>" .$row[1]."</td>";
              echo "<td>" .$row[0]. "</td>";
            echo "<td>" .$row[3]." tk"."</td>";
      echo "<td>" .$row[4]."</td>";
              echo "</tr>";
              }
 
?>
        
    </tbody>
  </table>
    
              <button type="submit" class="btn btn-danger btn-lg" id="p">
                    <span class="glyphicon glyphicon-remove" ></span>
                        DELETE</button>
        </form>
</div>
   
          
      </div>
            
    </div>
        
            </div>
        <!------------------------end Content----------------------->
    </div>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

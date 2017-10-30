<?php
require_once 'connect.php';
session_start();
//session_start();
?>
<?php
    $result = mysql_query("SELECT `categories`.`Cat_name`,`product`.`P_name`,`P_model`,`P_unitprice`FROM project.`product`
    INNER  JOIN `categories` ON `categories`.`Cat_id`=`product`.`Cat_id`
    WHERE `status`='inactive' ORDER BY  `P_id`  ");
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
                 <li role="presentation"class="active" ><a href="product.php">Product</a></li>
                   <li role="presentation"  ><a href="salesman.php">Salesman</a></li><br><br><br><br>
                   <li role="presentation" ><a href="logout.php">Logout</a></li>
                 
            </ul>           
        </div>
        <div class="col-md-9 content" >
                   <div class="col-md-8 content">
    <div class="form-group">
    <h2>    </h2>
    <h2>    Deleted Products</h2>
      </div>
    <?php
if(isset($_SESSION['sname'])&&!empty($_SESSION['sname'])){
     $var=$_SESSION['sname'];
    unset($_SESSION['sname']);
}
if(isset($_SESSION['duality'])&&!empty($_SESSION['duality'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>The person is already exists.</strong></p>";
    unset($_SESSION['duality']);
}
    if(isset($_SESSION['insert'])&&!empty($_SESSION['insert'])){
      echo "<p style='color:green;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>New salesman  added.</strong></p>";
    unset($_SESSION['insert']);
}
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
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>$var has deleted successfully.</strong></p>";
    unset($_SESSION['inactive']);
}
if(isset($_SESSION['fills'])&&!empty($_SESSION['fills'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Please Check one box which you want to active again.</strong></p>";
    unset($_SESSION['fills']);
}

?>
                     <table class="table table-striped">
    <thead>
      <tr >
         <th>Checkbox</th>
            <th>Brand</th>
          <th>Product</th>
          <th>Model</th>
          <th>Price</th>
      </tr>
    </thead>
    <tbody>
        <form action="activeproduct.php" method="post">
    <?php
            while($row=mysql_fetch_array($result,MYSQL_NUM)){
                echo "<tr>";
            echo "<td><input type=\"checkbox\" name=\"select[]\" value=\"$row[1]-$row[2]+\" id=\"checkbox\"></td>";
          echo "<td>" .$row[1]."</td>";
                echo "<td>" .$row[0]."</td>";
                echo "<td>" .$row[2]."</td>";
                echo "<td>" .$row[3]."</td>";
              echo "</tr>";
              }
 
?>
        
    </tbody>
  </table>
      
</div>
    <div class="col-md-4 content">
              <button type="submit" class="btn btn-success btn-lg" id="p">
                    <span class="glyphicon glyphicon-retweet" ></span>
                        Active</button>
        </form>
          
      </div>
            
    </div>
        
            </div>
        <!------------------------end Content----------------------->
    </div>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

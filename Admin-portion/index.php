<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
          .main{
                width:1000px;
                margin: auto;
                height: 820px;
            }
        #main{
                width:1000px;
                height: auto;
            margin-left:0px;
            }
  </style>
</head>
    <?php
require_once 'connect.inc.php';
require_once 'core.inc.php';



?>
<body>
<div class="main">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">IT_MART</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
          
      </ul>
         
    </div>
  </div>
</nav>
    
  
<div class="container" id="main">
    
  <h3>IT_MART</h3>
  <p>IT_MART's IT Services was founded in 2001 by Ryan Rucker.  Ryan created the business to support the need for IT services in the Midlands of South Carolina.IT_MART's IT Services promises to provide professional IT Services in the Midlands of South Carolina by building excellent customer satisfaction and knowledgeable IT infrastructure.</p>
    <br>
    <?php
if(isset($_SESSION['v'])&&!empty($_SESSION['v'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Invalid name or password</strong></p>";
    unset($_SESSION['v']);
}
?>

    <button type="button" class="btn btn-default btn-lg" id="myBtn" >Login Admin</button>

  <!-- Modal -->
    
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
            
        </div>
          <form method="post" action="login.php">
        <div class="modal-body" style="padding:40px 50px;">
          
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" id="usrname" placeholder="Enter name" required="required">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" id="psw" placeholder="Enter password" required="required">
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
<br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="laptop.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Laptop</h3>
          <p>We have various laptops and it's parts.</p>
        </div>
      </div>

      <div class="item">
        <img src="dslr.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Dslr</h3>
          <p>We have world class dslrs.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="printer.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Printer</h3>
          <p>Hp,Canon printers are availables in our store.</p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <sparrrrrrrrrrrrrrrn class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

    

</div>

</body>
</html>

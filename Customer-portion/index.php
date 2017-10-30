<!DOCTYPE html>
<html lang="en">
<head>
    
<meta charset="UTF-8">
<title>IT_MART</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
       .navbar-custom {
    color: #FFFFFF;
    background-color: #CC3333;
}
 .jm-item {
	padding: 10px;
	display: inline-block;
	text-align: left;
}
.jm-item-wrapper {
	position: relative;
	padding: 7px;
	background: #E8D7B6;
}
.jm-item-image {
	position: relative;
	overflow: hidden;
}
.jm-item-image img {
	display: block;
}
.jm-item-title {
    position: absolute;
    left: -10px;
    bottom: 17px;
    background: #FF6B0E;
    line-height: 1.5em;
    font-weight: normal;
    padding: 7px 9px 6px;
    text-transform: uppercase;
    font-family: 'Oswald', sans-serif;
    color: #FFFFFF;
    font-size: 1.4em;
}
.jm-item-overlay {
	background: #000;
	opacity: 0;
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	-webkit-transition: opacity 0.5s ease-in 0s;
	-moz-transition: opacity 0.5s ease-in 0s;
	-o-transition: opacity 0.5s ease-in 0s;
	transition: opacity 0.5s ease-in 0s;
}
.jm-item-wrapper:hover .jm-item-overlay {
	opacity: 0.3;
}
.jm-item-button {
	height: 50px;
	width: 50px;
	text-align: center;
    font-size: 15px;
    position: absolute;
	left: 50%;
	margin-left: -25px;
}
.jm-item-button a {
    border-radius: 50%;
    -webkit-border-radius: 50%;
    background: #FF6B0E;
    text-transform: uppercase;
    font-family: 'Oswald', sans-serif;
    color: #FFFFFF;
    font-size: 1.2em;
    line-height: 50px;
    -webkit-transition: all 0.2s ease-in 0s;
    -moz-transition: all 0.2s ease-in 0s;
    -o-transition: all 0.2s ease-in 0s;
    transition: all 0.2s ease-in 0s;
    text-decoration: none !important;
    display: block;
}
        body{
        background-color: #F2F2F2;
        }
.jm-item-button a:hover {
	background: #3b3b3b;	
}
        .second .jm-item-wrapper .jm-item-title {
	-webkit-transition: all 0.2s ease-in 0s;
	-moz-transition: all 0.2s ease-in 0s;
	-o-transition: all 0.2s ease-in 0s;
	transition: all 0.2s ease-in 0s;
}
.second .jm-item-wrapper:hover .jm-item-title {
	left: -100%;
}
.second .jm-item-description {
	position: absolute;
	width: 100%;
	height: 100%;
	padding: 10px;
    font-size:1.2em;
text-align: center;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;	
	background: rgba(0,0,0,0.4);
	color: #fff;
	top: 100%;
	-webkit-transition: all 0.5s ease-in 0s;
	-moz-transition: all 0.5s ease-in 0s;
	-o-transition: all 0.5s ease-in 0s;
	transition: all 0.5s ease-in 0s;
}
.second .jm-item-wrapper:hover .jm-item-description {
	top: 0;
}
    </style>
</head>
<body>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">IT_MART</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#" >Home</a></li>
                <li><a href="aboutus.php" >About</a></li>
                <li><a href="contactus.php" >Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="jumbotron">
        <div class="container">
<div class="jm-item second" >
	<div class="jm-item-wrapper">
		<div class="jm-item-image">
			<img src="itmart.jpg" alt="itmart" style="max-width:100%;height:auto;" alt="Royal Enfield Motorcycle, photographed by Renjith Sasidharan"/>
			<div class="jm-item-description"  id="responsive-header"><br><br><br><br><br>
			    Collection of gadgets<br>
			    1. Laptops<br>
			    2. Camera<br>
      3. Printer<br>
                4. Scanner<br>
			    <div class="jm-item-button"><a href="bootstraptableimage.php">View</a></div>
			</div>
		</div>
		<div class="jm-item-title">IT_MART</div>
	</div>
</div>

            </div>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-2">
            <h2>Laptop</h2>
            <p>Apple, Dell, HP, MSI, Samsung, Lenovo ,Asus, Toshiba, Acer</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <h2>Camera</h2>
            <p>All DSLR ∗ Canon ∗ Nikon ∗ All Lens ∗ Canon ∗ Nikon ∗ All Compact ∗ Sony ∗ Canon ∗ Samsung</p>
                </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <h2>Printer</h2>
            <p>Laser ∗ Ink ∗ Multifunction ∗ POS ∗ Toner ∗ Cartridge ∗ All Printers</p>
        </div>
        <div class="clearfix visible-md-block"></div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <h2>Tablet</h2>
            <p>Apple ∗ Acer ∗ Asus ∗ Huawei ∗ Lenovo ∗ Samsung ∗ Twinmos ∗ All Brands.</p>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <h2>Network</h2>
            <p>Router ∗ Switch ∗ Hub ∗ Lan Card ∗ Edge Modem ∗ Network Accessories ∗ UTP Cable ∗ Access Point</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <h2>Office Equipment</h2>
            <p> Photocopier ∗ Projector  Screen ∗ CC Camera ∗ IP Camera ∗ Toner ∗ Paper shredder ∗ Money counter ∗ Presenter ∗ DVR/NVR</p>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <footer>
                <p>© Copyright 2013 It_mart.Next Genaration Technology</p>
                <img src="logo2.png">
            </footer>
        </div>
    </div>
</div>
      <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/jquery.fittext.js"></script>
        <script>
            //call fitText() function for the element you want to be fluid
            $("#responsive-header").fitText();
            //Font-size = 1/10th of the element's width
        </script>
</body>
</html>                                		
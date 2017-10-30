<!DOCTYPE html> <!-- The new doctype -->

<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>IT_MART</title>

	<style>
        body{
            background-color:#667A44 ;
        }

    header,footer,
article,section,
hgroup,nav,
figure{
	/* Giving a display value to the HTML5 rendered elements: */
	display:block;
}

article .line{
	/* The dividing line inside of tarticle is darker: */
	background-color:#15242a;
	border-bottom-color:#204656;
	margin:1.3em 0;
}

footer .line{
	margin:2em 0;
}

nav{
	background:url(img/gradient_light.jpg) repeat-x 50% 50% #f8f8f8;
	padding:0 5px;
	position:absolute;
	right:0;
	top:4em;

	border:1px solid #FCFCFC;

	-moz-box-shadow:0 1px 1px #333333;
	-webkit-box-shadow:0 1px 1px #333333;
	box-shadow:0 1px 1px #333333;
}

nav ul li{
	display:inline;
}

nav ul li a,
nav ul li a:visited{
	color:#565656;
	display:block;
	float:left;
	font-size:1.25em;
	font-weight:bold;
	margin:5px 2px;
	padding:7px 10px 4px;
	text-shadow:0 1px 1px white;
	text-transform:uppercase;
}

nav ul li a:hover{
	text-decoration:none;
	background-color:#f0f0f0;
}

nav, article, nav ul li a,figure{
	/* Applying CSS3 rounded corners: */
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
}




/* Article styles: */

#page{
	width:960px;
	margin:0 auto;
	position:relative;
}

article{
	background-color:#213E4A;
	margin:3em 0;
	padding:20px;

	
}

figure{
	border:3px solid #142830;
	float:right;
	height:300px;
	margin-left:15px;
	overflow:hidden;
	width:500px;
}

figure:hover{
	-moz-box-shadow:0 0 2px #4D7788;
	-webkit-box-shadow:0 0 2px #4D7788;
	box-shadow:0 0 2px #4D7788;
}

figure img{
	margin-left:-60px;
}

/* Footer styling: */

footer{
	margin-bottom:30px;
	text-align:center;
	font-size:0.825em;
}

footer p{
	margin-bottom:-2.5em;
	position:relative;
}

footer a,footer a:visited{
	color:#cccccc;
	background-color:#213e4a;
	display:block;
	padding:2px 4px;
	z-index:100;
	position:relative;
}

footer a:hover{
	text-decoration:none;
	background-color:#142830;
}

footer a.by{
	float:left;

}

footer a.up{
	float:right;
}
        
     a.ex2:hover, a.ex2:active {font-size: 150%;}
    </style>

</head>
<body>

	<section id="page"> <!-- Defining the #page section with the section tag -->

	<header> <!-- Defining the header section of the page with the appropriate tag -->

		<img src="logo.PNG"/>

        <p font:"italian">Next Generation Technology</p>
        <nav class="clear"> <!-- The nav link semantically marks your main site navigation -->

			<ul>

				<li><a class="ex2" href="#">Home</a></li>
				<li><a class="ex2" href="fa.php">About us</a></li>
				<li><a class="ex2" href="loginform.inc.php">Login</a></li>

			</ul>
        </header>
	
        
        
        <!-- Article 1 start -->

	<div class="line"></div>  <!-- Dividing line -->

	<article id="article1"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->

		<h2>IT_MART</h2>

		<div class="line"></div>

		<div class="articleBody clear">

			<figure> <!-- The figure tag marks data (usually an image) that is part of the article -->

				<script type="text/javascript">

var slideimages = new Array() // create new array to preload images
slideimages[0] = new Image() // create new instance of image object
slideimages[0].src = "laptop.jpg" // set image src property to image path, preloading image in the process
slideimages[1] = new Image()
slideimages[1].src = "dslr.jpg"
slideimages[2] = new Image()
slideimages[2].src = "laptop2.jpg"
slideimages[3] = new Image()
slideimages[3].src = "pendrive.jpg"
slideimages[4] = new Image()
slideimages[4].src = "dslr2.jpg"
slideimages[5] = new Image()
slideimages[5].src = "printer.jpg"
slideimages[6] = new Image()
slideimages[6].src = "harddisk.jpg"



</script>
</head>
<body>
<img src="laptop.jpg" id="slide" width="112%" height="100%" />

<script type="text/javascript">
//variable that will increment through the images
var step=0

function slideit(){
 //if browser does not support the image object, exit.
 if (!document.images)
  return
 document.getElementById('slide').src = slideimages[step].src
 if (step<7)
  step++
 else
  step=0
 //call function "slideit()" every 2.5 seconds
 setTimeout("slideit()",2500)
}

slideit()

</script>
			</figure>

			<p>IT_MART's offers a wide range of PC products including Laptops, Desktops printers and accessories. Whether it's basic home computer, Business system or Gaming machine we can build it.</p>

			<p>With the highest quality parts and a full suite of software options we can get your computer or network running like new. Our qualified technicians can advise on the best solution for you. </p>

		</div>

	</article>

	<!-- Article 1 end -->
        
        
        <footer> <!-- Marking the footer section -->

			<div class="line"></div>

			<p>Copyright 2010 - YourSite.com</p> <!-- Change the copyright notice -->
        </footer>

	</body>

</html>
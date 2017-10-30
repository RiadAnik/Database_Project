<?php
require_once 'connect.inc.php';
require_once 'core.inc.php';


?>
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

				<li><a class="ex2" href="index.php">Home</a></li>
				<li><a class="ex2" href="fa.php">About us</a></li>


			</ul>
        </header>
	
        
        
        <!-- Article 1 start -->

	<div class="line"></div>  <!-- Dividing line -->

	<article id="article1"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->

		<div class="line">
        
        </div>

		<div class="articleBody clear">

			<head>
    <style>
       
*{
	margin: 0;
	padding: 0;
	outline: none;
	
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

body {
	background: #667A44;
	color: #444;
	-webkit-font-smoothing: antialiased;
	font-family: "Open Sans", Arial, Helvetica, Geneva, sans-serif;
	font-size: 16px;
	font-weight: 400;
	height: auto !important;
	height: 100%;
	line-height: 1.6em;
	min-height: 100%;
}

h2 {
	color: rgb(34,34,34);
	font-size: 2.2em;	
	font-weight: 200;
	margin: 0 0 24px 0;
}

/*BUTTON DESIGN*/
[class*='btn-'] {
	border: none;
	border-bottom: 2px solid rgba(0,0,0,.15);
	border-top: 1px solid rgba(255,255,255,.15);
	border-radius: 3px;
	color: #fff;
	display: inline-block;
	font: -webkit-small-control;
	font-size: .7em;
	letter-spacing: 1px;
	line-height: 140%;
	padding: 10px 20px;
	text-decoration: none;
	text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);
	text-transform: uppercase;
	
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	-o-transition: all 0.1s linear;
	  transition: all 0.1s linear;
}

	.btn-minimal {
		background-color: rgb(255,255,255);
		border-radius: 0;
		border: 1px solid rgb( 186, 186, 186 );
		color: rgb( 186, 186, 186 );
		text-shadow: 0 1px 1px rgba(255, 255, 255, 1);
	}
	
		.btn-minimal:hover {
			background-color: #4195fc;
			border: 1px solid rgba(0,0,0,.1);
			color: rgb(255,255,255);
			cursor: pointer;
			text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);
		}
		
		.btn-minimal:active {
			box-shadow: 0 1px 1px rgba(0,0,0,0.15) inset;
			text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
		}

/*SECTION CONTAINER*/
section#loginBox {
	background-color: rgb(255,255,255);
	border: 1px solid rgba(0,0,0,.15);
	border-radius: 4px;
	box-shadow: 0 1px 0 rgba(255,255,255,0.2) inset, 0 0 4px rgba(0,0,0,0.2);
	margin: 40px auto; /*aligns center*/
	padding: 24px;
	width: 500px;
}

/*FORM*/
form.minimal label {
	display: block;
	margin: 6px 0;	
}

	form.minimal input[type="text"],
	form.minimal input[type="email"],
	form.minimal input[type="number"],
	form.minimal input[type="search"],
	form.minimal input[type="password"],
	form.minimal textarea {
		background-color: rgb(255,255,255);
		border: 1px solid rgb( 186, 186, 186 );
		border-radius: 2px;
		-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.08);
		-moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.08);
		  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.08);
		display: block;
		font-size: 14px;
		margin: 6px 0 12px 0;
		padding: 8px;	
		text-shadow: 0 1px 1px rgba(255, 255, 255, 1);
		width: 90%;
		
		-webkit-transition: all 0.1s linear;
		-moz-transition: all 0.1s linear;
		-o-transition: all 0.1s linear;
		  transition: all 0.1s linear;
	}
	
	form.minimal input[type="text"]:focus,
	form.minimal input[type="email"]:focus,
	form.minimal input[type="number"]:focus,
	form.minimal input[type="search"]:focus,
	form.minimal input[type="password"]:focus,
	form.minimal textarea:focus,
	form.minimal select:focus { 
		border-color: #4195fc;
		-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 0 8px #4195fc;
		-moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 0 8px #4195fc;
		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 0 8px #4195fc;
		color: rgb(0,0,0);
	}
	
		form.minimal input[type="text"]:invalid:focus,
		form.minimal input[type="email"]:invalid:focus,
		form.minimal input[type="number"]:invalid:focus,
		form.minimal input[type="search"]:invalid:focus,
		form.minimal input[type="password"]:invalid:focus,
		form.minimal textarea:invalid:focus,
		form.minimal select:invalid:focus { 
			border-color: rgb(248,66,66);
			-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 0 8px rgb(248,66,66);
			-moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 0 8px rgb(248,66,66);
			  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 0 8px rgb(248,66,66);
		}
    </style>
</head>
<body>
<section id="loginBox">
    
	<h2>Login</h2>
	<form method="post" class="minimal" action="login.php">
		<label for="username">
			Username:
			<input type="text" name="username" id="username" required="required" />
		</label>
		<label for="password">
			Password:
			<input type="password" name="password" id="password" required="required" />
		</label>
		<button type="submit" class="btn-minimal" href="login.php">Sign in</button>
        <?php
    if(isset($_SESSION['v'])&&!empty($_SESSION['v'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Invalid name or password</strong></p>";
    unset($_SESSION['v']);
}
?>
	</form>
</section>
</body>	
			


			</figure>

			
		</div>

	</article>

	<!-- Article 1 end -->
        
        
        <footer> <!-- Marking the footer section -->

			<div class="line"></div>

			<p>Copyright 2010 - YourSite.com</p> <!-- Change the copyright notice -->
        </footer>

	</body>

</html>
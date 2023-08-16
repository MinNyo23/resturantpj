<!DOCTYPE html>
<html>
<head>
	<title>about</title>
	<style>
	*{
	margin: 0;
	padding: 0;
	font-family: Century Gothic;

	}
	.body1{
	height: 100vh;
	min-height: 100vh;
	font-family: sans-serif;
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(images/111.jpg);

}
.img 
{
	border-radius: 20px;
	width: 300px;

}

	ul{
	float: right;
	list-style: none;
	margin-top: 25px;

}
ul li{
	display: inline-block;
}

ul li a{
	text-decoration: none;
	color: #fff;
	padding: 5 px 20px;
	border: 1px solid transparent;
	transition: 0.6s ease;
}
ul li a:hover{
	background-color: #fff;
	color: #fff;
}
ul li.active a{
	background-color: #fff;
	color: #000;
}
.logo img{

	float: left;
	width: 150px;
	height: auto;
}
.main{
	max-width: 1200px;
	margin: auto;
}
.title{
	position: absolute;
	top: 40%;
	left:50%;
	transform: translate(-50%,-50%);
}

.title h1{
	color: #fff;
	font-size: 70px;

}
.title h4{
	color: #fff;
	font-size: 30px;
	text-align: center;
}
.title h3{
	color: #fff;
	font-size: 20px;
	text-align: center;
}

.footer{
	background-color: #CBCBCB;
	color: #000;
}
.p1{
	position: relative;
	font-family: sans-serif;
	color: #fff;
	text-transform: uppercase;
	font-size: 2em;
	letter-spacing: 4px;
	overflow: hidden;
	background: linear-gradient(90deg, #000, #fff, #000);
	background-repeat: no-repeat;
	background-size: 80%;
	animation: animate 8s linear infinite;
	-webkit-background-clip: text;
	-webkit-text-fill-color: rgba(255,255,255,0);
	text-align: center;
}
@keyframes animate
{
	0%
	{
		background-position: -500%;
	}
	100%
	{
		background-position: 500%;
	}
}
.fbb h3
{
	color: #fff;
	font-size: 30px;
}
.fbb h2
{
	color: #fff;
	font-size: 20px;
}
	</style>


	
</head>
<body class="body1">
	<header >
	<div class="main">
			<div class="logo">
				<img src="images/logo1.png">
			</div>
			
			<ul>
			  <li class="active"><a href="#">Home</a> </li>
				<li><a href="menu.php">Menu</a> </li>
				<li><a href="contact.php">Contact</a> </li>
				<li><a href="about.php">About</a> </li>
				<li><a href="login.php">LOGIN</a> </li>
			</ul>
		</div>
	</header>
		<br><br><br><br><br>
		<p class="p1"> 5% DISCOUNT FOR MOONSOON PROMOTION</p>
		<br><br><br><br>
		<div class="title">
			<h3>Restaurant is a place for simplicity.Good food,good dessert and good service.Simple is the nameof the game,and we're good at finding it in all the right places,even in your dining experience.We're a small group from Denver,Colorado who make simple food possible.Come join us and see what simplicity tastes like.</h3><p>
			<h4>Rolling Stones.com.pt.ltd</h4>
		</div>
		<br><br><br><br><br><br><br><br><br><br><br>
		<div align="center">
		<img src="images/chef.jpg" width="230" height="200" class="img">
		</div>
		<div align="center" class="fbb">
			<h3>Ronal Wasalay</h3>
			<h2>Founder of Rollingstones</h2>
		</div>
		<br><br><br><br><br><br>
		<div>
		<footer class="footer">
    <h4 align="center"><a href="../Pages/index.html">www.rollingstone.com&copy;</a></h4>
    </footer>
</div>

</body>
</html>
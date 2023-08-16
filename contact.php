<?php 
include('function.php');
include('admin/conn.php');
if(isset($_POST['message']))
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	$feedback=$_POST['feedback'];
	$message=$_POST['message'];
	$error=array(
      'username'=>'',
      'email'=>'',
      'feedback'=>'',
      'message'=>'',      
	);
	if($username=='')
	{
		$error['username']='Username must be enter';		
	}
	else
	{
		if(strlen($username)<3)
		{
			$error['username']='Username need to be longer';
		}
	}
	if($email==''){
		$error['email']='E-mail must be enter';
	}
	if($feedback==''){
		$error['feedback']='Feedback must be enter';
	}
	if($message==''){
		$error['message']='';
	}
    foreach ($error as $key => $value) {
	if(empty($value)){
		unset($error[$key]);
	}
}
    if(empty($error)){
	    create_msg();
    }
} 
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="contact.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body class="body">
	<header class="header">
<div class="main">
			<div class="logo">
				<img src="./photo/logo1.png">
			</div>
			
			<ul>
				<li><a href="home.php">Home</a> </li>
				<li><a href="menu.php">Menu</a> </li>
				<li><a href="contact.php">Contact</a> </li>
				<li><a href="about.php">About</a> </li>
				<li><a href="login.php">Login</a> </li>
			</ul>
		</div>
		</header>
		<section class="contact">
			<div class="content">
				<h2>Contact Us</h2>
				<p>To Know More Information And Give Any Of Advices Contacts Us</p>
			</div>
			<div class="container">
				<div class="contactInfo">
					<div class="box">
						<div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
						<div class="text">
							<h3>Adress</h3>
							<p>12/13 Maharbandula Road</p>
						</div>
					</div>
					<div class="box">
						<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
						<div class="text">
							<h3>Phone</h3>
							<p>09-950-950-335</p>
						</div>
					</div>
					<div class="box">
						<div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
						<div class="text">
							<h3>Email</h3>
							<p>rollingstone@gmail.com</p>
						</div>
					</div>
				</div>
				<div class="contactForm">
					<form id="contact-form" method="post" action="">
						<h2>Send Message</h2>
						<div class="inputBox">
							<input type="text" name="username" required="required">
							<span>Full Name</span>
						</div>
						<div class="inputBox">
							<input type="text" name="email" required="required">
							<span>Email</span>
						</div>
						<div class="inputBox">
							<input type="text" name="feedback" required="required">
							<span>Send Feedback</span>
						</div>					
						<div class="inputBox">
							<input type="submit" name="message" value="Send">
						</div>
					</form>
				</div>
			</div>
		</section>
</body>
<footer class="footer">
    <h4 align="center"><a href="../Pages/index.html">www.Rollingstone.com&copy;</a></h4>
    </footer>
</html>


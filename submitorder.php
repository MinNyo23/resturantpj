<?php 
session_start();
include('admin/conn.php');
include('function.php');
if(!empty($_SESSION['user']))
{
	$username=$_SESSION['user'];
	$query="select * from user where username='$username'";
	$go_query=mysqli_query($connection,$query);
	while ($out=mysqli_fetch_array($go_query))
	{
		$userid=$out['userid'];
		$username=$out['username'];
		$email=$out['email'];
		$phone=$out['phone'];
		$address=$out['address'];
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.bg{
			background-image: url();
			background-size: cover;
		}
		.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.container .row{
	width: 100%;
}
	</style>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="    sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/fontawesome.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg" style="background-color: ;background-image: url(./images/blur9.png);background-size: cover;">
<?php 
include('header.php');
 ?>
 <br>
 <div class="container" style="width: 650px;background-image: url('./images/food1.jpg');background-size: 650px 650px;height: 650px;">
	<div class="row">
		
	</div>
	<div class="row">
		<div class="col-md-6 offset-3">
			<form action="submit.php" method="post">
				<div class="form-group">
					<h5 style="color: yellow;">Username</h5>
					<input type="text" name="username" value="<?php if(isset($username)){ echo $username; }?>" class="form-control">
					<input type="hidden" name="userid" value="<?php if(isset($userid)){ echo $userid; }?>">

				</div>
				<div class="form-group">
					<h5 style="color: yellow;">Email</h5>
					<input type="text" name="email" value="<?php if(isset($email)){ echo $email; }?>" class="form-control">
				</div>
				<div class="form-group">
					<h5 style="color: yellow;">Phone</h5>
					<input type="text" name="phone" value="<?php if(isset($phone)){ echo $phone; }?>" class="form-control">
				</div>
				<div class="form-group">
					<h5 style="color: yellow;">Address</h5>
					<textarea name="address" class="form-control" rows="3" cols="20"><?php if(isset($address)){ echo $address; }?></textarea> 
				</div>
				<div class="form-group">
					<h5 style="color: yellow;">Payment Type</h5>
					<select name="paymenttype" class="form-control">
						<option value="mastercard">Mastercard</option>
						<option value="visacard">Visa</option>
						<option value="mpu">MPU</option>
					</select>
				</div>
				<div class="form-group">
					<h4 style="color: yellow;">Card Number</h4>
					<input type="text" name="cardno" class="form-control">
				</div>
				<div class="form-group" style="text-align: center;">
					
					<input type="submit" name="submit" value="Order Now" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
</div>
<br>
</body>
</html>
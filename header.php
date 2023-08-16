<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="    sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/fontawesome.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
	<?php 
     if(empty($_SESSION['user'])):
	 ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a href="" class="navbar-brand">
		<i class="material-icons" style='font-size:20px;color:#00ff00'>restaurant_menu</i>
       	RollingStone
       	<i class="material-icons" style='font-size:20px;color:yellow'>restaurant</i></a>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="home.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="register.php">Register</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="login.php">Login</a>
			</li>			
    		&nbsp;&nbsp;&nbsp;
    		<li>
    			<div class="sidenav">
			 <form method="post" action="search.php">
				<div class="input-group">
					<input type="text" class="form-control" name="search" placeholder="search food">
					<span class="input-group-append">
						<button type="submit" name="btnsearch" class="btn btn-primary btn-md"><i class="fas fa-search"></i></button>
					</span>
				</div>
			</form>
				</div>
    		</li>
		</ul>
</nav>
<?php
else:
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a href="" class="navbar-brand"><i class="material-icons" style='font-size:20px;color:#00ff00'>restaurant_menu</i>
       	RollingStone
	<i class="material-icons" style='font-size:20px;color:yellow'>restaurant</i></a>
       </a>
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="index.php"> Home </a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="cart.php"> Cart </a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="logout.php"> Logout </a>
		</li>
		<div class="sidenav">
			 <form method="post" action="search.php">
				<div class="input-group">
					<input type="text" class="form-control" name="search" placeholder="search food">
					<span class="input-group-append">
						<button type="submit" name="btnsearch" class="btn btn-primary btn-md"><i class="fas fa-search"></i></button>
					</span>
				</div>
			</form>
				</div>
	</ul>
</nav>

<?php 
endif;
 ?>
 
</body>
</html>
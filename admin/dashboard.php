<?php
session_start(); 
include('conn.php');
include('function.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: transparent;
  width: 250px;
  height: 130px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}
</style>
	<style type="text/css">
		.bg{
	 background-image: url(../images/category4.jpg);
	 background-size: cover;
	 
			}
	</style>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="    sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg">
<?php 
include('header.php');
 ?>
<div class="container"> <br><br>
	<div class="row">
		<div class="col-md-4 offset-1"> 
		 <div class="flip-card">
  			<div class="flip-card-inner">
    		<div class="flip-card-front">
      			<img src="../images/category.png" alt="Avatar" style="width:250px;height:130px;">
    		</div>
    	<div class="flip-card-back">
      	<div class="card-header bg-danger text-center text-white">
		          		<h5>
		          			<i class="fa fa-list"> Category</i>
		          		</h5>
		        	</div>
		    		<div class="card-body bg-dark text-center">
		          		<a href="category.php" class="btn btn-success">View Detail
		          			<span class="badge badge-pill badge-dark">
		          				<?php 
		          					$total="select * from category";
		          					$get_total=mysqli_query($connection,$total);
		          					$num=mysqli_num_rows($get_total);
		          					echo $num;
		          				 ?>
		          			</span>
		          		</a>
		          	</div>
    </div>
  </div>
</div> <!---flip card --->
		    </div> <!--- col-md-4 offset-1 ---->
		<div class="col-md-4 offset-3">
		 <div class="flip-card">
  			<div class="flip-card-inner">
    		<div class="flip-card-front">
      			<img src="../images/foodlist3.jpg" alt="Avatar" style="width:250px;height:130px;">
    		</div>
    	<div class="flip-card-back">
      	<div class="card-header bg-danger text-center text-white">
		          		<h5>
		          			<i class='fas fa-clipboard-list'> Food List</i>
		          		</h5>
		        	</div>
		    		<div class="card-body bg-dark text-center">
		          		<a href="productlist.php" class="btn btn-success">View Detail
		          			<span class="badge badge-pill badge-dark">
		          				<?php 
		          					$total="select * from food";
		          					$get_total=mysqli_query($connection,$total);
		          					$num=mysqli_num_rows($get_total);
		          					echo $num;
		          				 ?>
		          			</span>
		          		</a>
		          	</div>
    </div>
  </div>
</div> <!---flip card --->
		    </div> <!--- col-md-4 offset-1 --->
	</div>  <!---- main row ---->
</div>  <!--- main container ---->
<br><br><br><br>
<div class="container"> <br><br>
	<div class="row">
		<div class="col-md-4 offset-1">
		 <div class="flip-card">
  			<div class="flip-card-inner">
    		<div class="flip-card-front">
      			<img src="../images/user2.png" alt="Avatar" style="width:190px;height:130px;">
    		</div>
    	<div class="flip-card-back">
      	<div class="card-header bg-danger text-center text-white">
		          		<h5>
		          			<i class='fas fa-users'> User</i>
		          		</h5>
		        	</div>
		    		<div class="card-body bg-dark text-center">
		          		<a href="userlist.php" class="btn btn-success">View Detail
		          			<span class="badge badge-pill badge-dark">
		          				<?php 
		          					$total="select * from user";
		          					$get_total=mysqli_query($connection,$total);
		          					$num=mysqli_num_rows($get_total);
		          					echo $num;
		          				 ?>
		          			</span>
		          		</a>
		          	</div>
    </div>
  </div>
</div> <!---flip card --->
		    </div> <!--- col-md-4 offset-1 ---->
		<div class="col-md-4 offset-3">
		 <div class="flip-card">
  			<div class="flip-card-inner">
    		<div class="flip-card-front">
      			<img src="../images/foodorder.jpg" alt="Avatar" style="width:250px;height:130px;">
    		</div>
    	<div class="flip-card-back">
      	<div class="card-header bg-danger text-center text-white">
		          		<h5>
		          			<i class="fa fa-list"> Order</i>
		          		</h5>
		        	</div>
		    		<div class="card-body bg-dark text-center">
		          		<a href="order_mgmt.php" class="btn btn-success">View Detail
		          			<span class="badge badge-pill badge-dark">
		          				<?php 
		          					$total="select * from orderdetail";
		          					$get_total=mysqli_query($connection,$total);
		          					$num=mysqli_num_rows($get_total);
		          					echo $num;
		          				 ?>
		          			</span>
		          		</a>
		          	</div>
    </div>
  </div>
</div> <!---flip card --->
		    </div> <!--- col-md-4 offset-1 --->		 
	</div>  <!---- main row ---->
</div>  <!--- main container ---->
<div class="container"><br>
	<h4 style="text-align: center;font-family: 'Abril Fatface', serif;font-size: 30px;"><b>Please Hover Image</b> <i class="fa fa-hand-o-up"></i></h4>
</div>
<?php 
include('footer.php');
 ?>
</body>
</html>
<?php 
session_start();
include('function.php');
include('conn.php');
 ?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="    sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     <link rel="stylesheet" href="path/to/font-awesome/css/fontawesome.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<title>adduser</title>
	<style>
		*{
			margin:0;
			padding: 0;
			box-sizing: border-box;

		}
		body{
			min-height: 100vh;
			background: #eee;
			font-family: sans-serif;
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(../images/7.jpg);




		}
		.container1{
			margin: auto;
			width: 800px;
			max-width: 90%;
			padding: 15vh;
					
		}
		.container1 form{
			width: 100%;
			height: 100%;
			padding: 20px;
			background: white;
			border-radius: 10px;
			box-shadow: 0 8px 16px rgba(0,0,0,0.3);


		}
		.container1 form h1{
			text-align: center;
			margin-bottom: 24px;
			color: #222;


		}
		.container1 form.form-control{
			width: 100%;
			height: 40px;
			background: white;
			border-radius: 4px;
			border:1px solid silver;
			margin: 10px 0 18px 0;
			padding: 0 10px;

		}
		.container1 form .btn{
			margin-left: 50%;
			transform: translateX(-50%);
			width: 120;
			height: 34px;
			border: none;
			outline: none;
			background: #27a327;
			cursor: pointer;
			font-size: 16px;
			text-transform: uppercase;
			color: white;
			border-radius: 4px;
			transition: .3s;
		}
		.container1 form  .btn:hover{
			opacity: .7;
		}
	</style>
</head>

<?php 
if( isset($_POST['adduser']) )
{
	adduser();
}
 ?>
 <nav class="navbar navbar-dark bg-dark justify-content-between">
  <div class="container">
		 <div class="navbar-header">
       <h4 style="color: white">
       	<i class="material-icons" style='font-size:25px;color:#00ff00'>restaurant_menu</i>
       	<b>Welcome To Restaurant   </b>
       	<i class="material-icons" style='font-size:25px;color:yellow'>restaurant</i> 
       </h4>    
		</div>  
		<ul class="nav justify-content-end navbar-nav nav">
      <li><h5><a href="dashboard.php" style="color: orange;"><b>Admin  </b>  </a>   
      <a href="dashboard.php"> <i class="fa fa-user-secret" style='font-size:24px;color:red'></i>
      </a></h5>
      </li>
    </ul>
        </div> 
</nav>


<body class="body">

	<div class="container1">
		<div class="row">
			
		</div>

		<div class="row">
			<div class="col-md-8 offset-2">
				<form class=""  method="post">
					<div class="form-group">
						<label for="">User Name</label>
						<input type="text" name="username" value="" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" value="" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input type="password" name="confirmpassword" value="" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">User type</label>
						<select name="usertype" class="form-control">
							<option value="admin">-----Admin-----</option>
                            <option value="user">-----User-----</option>
						</select>
					</div>
					<button type="submit" name="adduser" class="btn btn-primary btn-block">Submit</button>
				</form>
			</div>
		</div>		
	</div>
<?php 
include('footer.php');
 ?>
</body>
</html>
<?php
session_start() ;
 include('conn.php');
 include('function.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.bg{
			background-color: skyblue;
			background-size: cover;
		}
		
		tr:hover{background-color:#ffcc00}
	</style>
	<title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="    sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="bg">

<?php
include('header.php');
?>

<div class="container"> <br>
	<div class="row">
		<div class="col-md-12">
			          
				<table class="table table-striped" style="background-color: transparent;">
					<tr>
						<td colspan="7" align="center">
							<a href="adduser.php" class="btn btn-warning">
								<i class="fa fa-plus">Add User </i>
							</a>
						</td>
					</tr>
					<tr style="font-size: 25px;">
						<th><b>User Id</b></th>
						<th><b>User Name</b></th>
						<th><b>Role</b></th>
						<th><b>Action</b></th>
					</tr>

					<?php 
					if (isset($_GET['action'] ) && $_GET['action']=='delete')
					{
						deluser();
					}
					$query="select * from user order by userid desc";
					$go_query = mysqli_query($connection,$query);
					while ($row=mysqli_fetch_array($go_query))
					{
						$userid=$row['userid'];
						$username=$row['username'];
						$role=$row['role'];
						echo "<tr>";
						echo "<td><b>{$userid}</b></td>";
						echo "<td><b>{$username}</b></td>";
						echo "<td><b>{$role}</b></td>";
						echo "<td><a href='userlist.php?action=delete&id={$userid}' style='color:red;'  class='fa fa-trash' onclick=\"return confirm('Are U Sure?')\">  DELETE</a></td>";
						echo "</tr>";
					}
					 ?>					
				</table>
			
		</div>
	</div>
</div>

</body>
</html>
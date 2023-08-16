<?php 
//session_start();
include('admin/conn.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		
	</style>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="    sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/fontawesome.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
	<div class="col-sm-4 offset-4">
	  <div class="sidenav">
		<h3 style="color: skyblue;"><u class="underline" style="text-decoration-style: wavy;
			text-decoration-color: white;">Category</u></h3>
		<div class="row">
			<div class="card card-body bg-white" 
			style="background-image: url(./images/orange.jpg);background-size: cover;border-radius: 25px;border: 2px solid black;">
		
			    <div class="col-sm-12">
				
					<?php 
                       $category=mysqli_query($connection,"select catid,catname from category ORDER BY catname ASC");
                       while($row=mysqli_fetch_array($category))
                       {
                       	$catid=$row['catid'];
                       	$catname=$row['catname'];
                     ?>
                     	<li><a style="color: black;text-align: center;" href='category.php?cid=<?php echo $catid; ?>'><?php echo $catname ;?>
                     	</a>
                        </li>
                     	<?php
                        }  
					    ?>
				
			    </div>
		    </div>
		</div>
	  </div>
   </div>
   
	
</div>
</div>
</div>
</body>
</html>

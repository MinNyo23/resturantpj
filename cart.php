<?php 
session_start();
include('function.php');
include('admin/conn.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="    sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/fontawesome.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body style="background-color: ;background-image: url(./images/blur9.png);background-size: cover;">

<?php
	include('header.php');
?>

<div class="container">
	<br>
	<div class="row">
		
		<div class="col-sm-12" style="text-align: center;">
	         <div class="card card-header bg-info">
	         <marquee>	
		  <h2 style="color: black;"><i class='far fa-hand-peace'></i> Welcome!
			<span style="color: white;">
		     <?php
			if (!empty($_SESSION['user']))
			 {
			    echo $_SESSION['user'];
			 }
			else
			 {
			    $_SESSION['user']='';
			   echo "No";
			 }
		     ?>
			</span>
			<i class='far fa-hand-peace'></i>
			</h2>
		</marquee>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
		<div class="panel panel-success">
			<div class="panel-heading text-center">
				<h2 style="color: skyblue;">
					Please select Shopping Cart.
				</h2>
			</div>  <br>
			<?php
				if (!empty($_SESSION['cart'])):
			?>
			<div class="panel-body" style="border: 3px solid black;background-color: black;">
				<table class="table table-condensed">
					<tr style="color: white;background-color: black;color: yellow;">
						<th>Photo 		</th>
						<th>Name 		</th>
						<th>Quantity	</th>
						<th>Unit Price	</th>
						<th>Price		</th>
						<th>Action		</th>
					</tr>
					<?php
						$total=0;
						foreach($_SESSION['cart'] as $id=>$qty):
						$result=mysqli_query($connection,"select * from food where foodid=$id");
						$row=mysqli_fetch_assoc($result);
						$total+=$row['price'] * $qty;
					?>
					<tr style="color: white;background-color: black;">

						<td><img src="images/<?php echo $row['photo'] ?>" width="200" height="250" class="img img-thumbnail"></td>
						<td><h5><?php echo $row['foodname'] ?></h5></td>
						<td><h5><?php echo $qty ?>
							<span>
								<a href="increase_qty.php?id=<?php echo $id ?>" class="fas fa-sort-up"></a>
								<a href="decrease_qty.php?id=<?php echo $id ?>" class="fas fa-sort-down"></a>
							</span></h5>
						</td>
						<td><h5><?php echo $row['price'] ?></h5></td>
						<td><h5><?php echo $row['price']*$qty ?></h5></td>
						<td>
							<span style="margin: 5px"></span>
							<a href="remove.php?id=<?php echo $id ?>" class="fas fa-trash-alt"></a>
						</td>
					</tr>
					<?php endforeach; ?>
					<tr style="color: white;background-color: black;">
						<td colspan="5" align="right"><b>Total:</b></td>
						<td>$<?php echo $total; ?></td>
					</tr>
				</table>
			</div>
			<br>
			<div class="panel-footer" style="text-align: right;">
				<a href="clear.php" class="btn btn-danger">Clear Cart</a>&nbsp;
				<a href="index.php" class="btn btn-default">Back</a>&nbsp;
				<a href="submitorder.php" class="btn btn-primary">Submit Order</a>&nbsp;
			</div>
			<?php else: ?>
				<h3 class="text-danger text-center">You select no Product now!</h3>
				<p class="text-center"><a href="index.php" class="btn btn-success">Shop Now!</a></p>
			<?php endif; ?>
		</div>
	 </div>
	</div>
</div>
<br>
</body>
</html>
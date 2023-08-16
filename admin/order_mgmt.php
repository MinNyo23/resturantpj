<?php 
session_start();
global $connection;
include('conn.php');
$order=mysqli_query($connection,"select * from orders order by orderid desc");
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
<body>
<?php 
include('header.php')
 ?>
 <div class="container">
	<div class="row">
		<div class="col-sm-12">
	         <div class="card card-header">
		  <h2>Welcome!
			<span>
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
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<table class="table table-hover">
		<tr>
			<td>No</td>
			<td>Customer Name</td>
			<td>Phone</td>
			<td>Delivery Address</td>
			<td>Item</td>
			<td>Order Date</td>
			<td>Send Date</td>
			<td>Action</td>		
		</tr>
		<?php 
		while($out=mysqli_fetch_array($order))
		{
			$check=$out['status'];
		if($check>0){
			$show='<tr class="mark">';
		}
		else
		{
			$show='<tr>';
		}
		    $show.='<td>'.$out['orderid'].'</td>';
		    $show.='<td>'.$out['deliveryname'].'</td>';
		    $show.='<td>'.$out['deliveryphone'].'</td>';
		    $show.='<td>'.$out['deliveryaddress'].'</td>';
		    $show.='<td>';
		    $orderid=$out['orderid'];
		    $order=mysqli_query($connection,"select orderdetail.*,food.* from orderdetail left join food on orderdetail.food=food.foodid where orderdetail.orderid='$orderid'");
		    while($row=mysqli_fetch_assoc($order)){
		    	$show.='<ul><li>'.$row['foodname'].'<span style="color: red;">['.$row['foodqty'].']</span></li></ul>';
		    }
		    $show.='</td>';
		    $show.='<td>'.$out['orderdate'].'</td>';
		    $chesec=$out['status'];
		    if($chesec>0){
		    	$show.='<td>'.$out['senddate'].'</td>';
		    }
		    else{
		    	$show.='<td>----/--/--</td>';
		    }
		    if($out['status']){
		    	$show.='<td><a href="status.php?id='.$out['orderid'].'&status=0" class="btn btn-danger">Undo</a></td>';
		    }
		    else{
		    	$show.='<td><a href="status.php?id='.$out['orderid'].'&status=1" class="btn btn-success">Mark as deliver</a></td>';
		    }
		    $show.='</tr>';
		    echo $show;
		}
		 ?>
		
	</table>
</div> 
</div>
</body>
</html>
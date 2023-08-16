<?php 
include('conn.php');
$id=$_GET['id'];
$status=$_GET['status'];
if($status==1)
{
	$query="update orders set status=1,senddate=now() where orderid='$id'";
	// $query="update orders set status=1,sendate=now() where orderid='$id'";
	$go_query=mysqli_query($connection,$query);
	header('location:order_mgmt2.php');
}
else
{
	$query="update orders set status=0,senddate='null' where orderid='$id'";
	$go_query=mysqli_query($connection,$query);
	header('location:order_mgmt2.php');
}
 ?>
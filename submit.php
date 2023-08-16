<?php 
   session_start();
   include('admin/conn.php');
   $userid=$_POST['userid'];
   $username=$_POST['username'];
   $phone=$_POST['phone'];
   $address=$_POST['address'];
   $payment=$_POST['paymenttype'];
   $cardno=$_POST['cardno'];
   $query="insert into orders(orderdate,customerid,deliveryname,deliveryphone,deliveryaddress,status)";
   $query.="values(now(),'$userid','$username','$phone','$address',0)";
   $go_query=mysqli_query($connection,$query);
   $orderid=mysqli_insert_id($connection);
   foreach($_SESSION['cart'] as $id => $qty)
   {
   	$get_price=mysqli_query($connection,"select * from food where foodid='$id'");
   	while($out=mysqli_fetch_array($get_price))
   	{
   		$dbprice=$out['price'];
   	}
   	$amount=$dbprice*$qty;
   	$query="insert into orderdetail(orderid,foodid,foodqty,amount)";
   	$query.="values('$orderid','$id','$qty','$amount')";
   	$go_query=mysqli_query($connection,$query);
   }
   $_SESSION['orderid']=$orderid;
   unset($_SESSION['cart']);
   header('location:showsuccess.php');
 ?>
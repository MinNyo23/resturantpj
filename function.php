<?php

function create_accu()
{
	global $connection;
	global $username;
	global $password;
	global $email;
	global $phone;
	global $address;
	$hpass=md5($password);
	$query="select * from user where username='$username'and password='$hpass'";
	$userquery=mysqli_query($connection,$query);
	$count=mysqli_num_rows($userquery);
	if($count>0)
	{
		echo"<script>window.alert('Already Exist')</script>";
	}
	else
	{
		$query="insert into user(username,password,email,phone,address,role)";
		$query.="values('$username','$hpass','$email','$phone','$address','user')";
		$go_query=mysqli_query($connection,$query);
		if(!$go_query)
		{
			die("query failed".mysqli_error($connection));
		}
		else
		{
			echo"<script>window.alert('Successful Created An Account')</script>";
		}
	}
}

function create_msg()
{
	global $connection;
	global $username;
	global $email;
	global $feedback;
	global $message;
	
	$query="select * from feedback where username='$username'";
	$userquery=mysqli_query($connection,$query);
	$count=mysqli_num_rows($userquery);
	if($count>0)
	{
		echo"<script>window.alert('')</script>";
	}
	else
	{
		$query="insert into feedback(username,email,feedback,message)";
		$query.="values('$username','$email','$feedback','$message')";
		$go_query=mysqli_query($connection,$query);
		if(!$go_query)
		{
			die("query failed".mysqli_error($connection));
		}
		else
		{
			echo"<script>window.alert('Message Successfully')</script>";
		}
	}
}

function showresult()
{
  global $connection;
  $data=$_POST['search'];
  $query="select * from food where foodname like '%$data%'";
  $go_query=mysqli_query($connection,$query);
  $countresult=mysqli_num_rows($go_query);
  if($countresult==0)
  {
  	 echo '<div class="card card-lg text-center">Sorry No Result Found! <a href="index.php" class="btn btn-danger btn-sm">Back</a></div>';
  }    
  elseif ($countresult>0)
  {
  	while($row=mysqli_fetch_array($go_query))
  	{
  		$foodid=$row['foodid'];
  		$foodname=$row['foodname'];
  		$categoryid=$row['categoryid'];
  		$price=$row['price'];
  		$qty=$row['qty'];
  		$photo=$row['photo'];
  	$display='<div class="col-sm-3"><div class="card-deck mb-3 text-center"><div class="card bg-dark shadow-sm"><div class="thumbnail">';
  		$display.="<img src='images/{$photo}' width='175' height='155' style='padding-top:8px;'>";
  		$display.="<div class='caption'>";
  		$display.="<h3 style='color:white;'>{$foodname}</h3>";
  		$display.="<p style='color:white;'>Price = {$price}$</p>";
  		$display.='<p class="text-center"><a href="addtocart.php?id='.$foodid.'"class="btn btn-primary">
  		<i class="fas fa-shopping-cart">Add To Cart</i></a></p>';
  		$display.="</div></div></div></div></div>";
  		echo $display;
  	}
  }
}

  ?>

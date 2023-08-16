<?php 
function insertcategory()
{
	global $connection;
	global $msg;
	$catname = $_POST['catname'];
	if ($catname=="")
	{
		echo "<script> window.alert('Please enter category name') </script>";
	}
	else if($catname!="")
	{
		$query="select * from category where catname='$catname' ";  
		$go_query = mysqli_query($connection,$query);
		$count = mysqli_num_rows($go_query);
		if ($count>0)
		{
			echo"<script> window.alert('This category name is already exist') </script>";   
		}
		else
		{
           $query="insert into category(catname) values('$catname')";
           $go_query = mysqli_query($connection,$query);
           if(!$go_query)
           {
           	die("query failed".mysqli_error($connection) );
           }
           else 
           {
           	echo "<script> window.alert('Successfully Inserted') </script>";
           }
		}
	}
}

function updatecategory()
{
  global $connection;
  $catname=$_POST['catname'];
  $catid=$_GET['cid'];
  $query ="update category set catname='$catname' where catid='$catid' "; 
  $go_query=mysqli_query($connection,$query);
  if(!$go_query)
  {
  	die("query failed".mysqli_error($connection));
  }
  //header("location:category.php");
}

function delcategory ()
{
	global $connection;
	$catid=$_GET['cid'];
	$query="delete from category where catid='$catid' ";
	$go_query=mysqli_query($connection,$query);
	//header("location:productlist.php");
}


function addproduct()
{
 global $connection;
 $foodname=$_POST['foodname'];
 $catid=$_POST['categoryid'];
 $price=$_POST['price'];
 $quantity=$_POST['quantity'];
 $photo=$_FILES['photo']['name'];

 if ($foodname=="")
 {
 	echo "<script>window.alert('Please Enter Product Name')  </script>" ;
 }
 else if ($price=="") 
 {
    echo "<script>window.alert('Please Enter Price')  </script>" ;
 }
 else if (is_numeric($price)==false)
 {
 	echo "<script>window.alert('Please Enter Price is Numeric Value')  </script>" ;
 }
 else if ($quantity=="") 
 {
    echo "<script>window.alert('Please Enter Quantity')  </script>" ;
 }
 else if (is_numeric($quantity)==false)
 {
 	echo "<script>window.alert('Please Enter Quantity is Numeric Value')  </script>" ;
 }
 else if ($photo=="") 
 {
    echo "<script>window.alert('Please Choose Product Image')  </script>" ;
 }

 else if ($foodname!="" && $photo!="") 
 {
 	$query="select * from food where foodname='$foodname' ";
 	$ch_query=mysqli_query($connection,$query);
 	$count=mysqli_num_rows($ch_query) ;
 	if ($count>0) 
 	{
 		echo "<script>window.alert('This Product is already exist')  </script>" ;
 	}
 	else
 	{                            
 		$query="insert into food (foodname,categoryid,price,qty,photo)" ;
 		$query.="values('$foodname','$catid','$price','$quantity','$photo')" ;
 		$go_query=mysqli_query($connection,$query) ;
 		if (!$go_query)
 		{
 			die("query failed".mysqli_error($connection));
 		}
 		else
 		{
 			echo "<script>window.alert('Succefully inserted')</script>";
 			move_uploaded_file($_FILES['photo']['tmp_name'],'../images/'.$photo); 
 			header("location:productlist.php") ;
 		}
 	}
 }
}


function updateproduct ()
{
	global $connection;
	$foodid=$_GET['pid'];
	$foodname=$_POST['foodname'];
	$categoryid=$_POST['categoryid'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	$photo=$_FILES['photo']['name'];
	if (!$photo)
	{
		$query="update food set foodname='$foodname',categoryid='$categoryid',price='$price',qty='$quantity' where foodid='$foodid' ";
	}
	else
	{
		$query="update food set foodname='$foodname',categoryid='$categoryid',price='$price',qty='$quantity',photo='$photo' where foodid='$foodid' ";
	}
	$go_query=mysqli_query($connection,$query);   
	if(!$go_query) 
	{
		die("query_failed".mysqli_error($connection));
	}
	else
	{
		move_uploaded_file($_FILES['photo']['tmp_name'],'../images/'.$photo);
	}
	header("location:productlist.php");
}

function deluser()
{
	global $connection;
	$userid=$_GET['id'];
	$query="delete from user where userid='$userid' ";
	$go_query=mysqli_query($connection,$query);
	header("location:userlist.php");
}

function adduser()
{
	global $connection;
	$uname=$_POST['username'];
	$password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype=$_POST['usertype'];
    if ($password!=$cpassword)
    {                                                   
    	echo "<script> window.alert('password and confirmpassword are must be same')</script>";
    }

    else if ($password!="" && $uname !="")
    {
    	$query = "select * from user where username = '$uname' and password = md5('$password') ";
    	$ch_query = mysqli_query($connection,$query);
    	$count = mysqli_num_rows($ch_query);
    	if ($count>0)
    	{
    		echo "<script> window.alert('This user is already exist.')</script>  ";
    	}	
    	else
    	{
    		$hashvalue = md5 ($password);
    		$query = "insert into user (username,password,role)";
    		$query.= "values('$uname','$hashvalue','$usertype')";

    		$go_query = mysqli_query($connection,$query);
    		if(!$go_query)
    		{
    			die("query faile".mysqli_error($connection) );
    		}
    		header("location:userlist.php");
    	}
    }
}

function delproduct ()    
{
	global $connection;
	$foodid=$_GET['pid'];	
	$query="delete from food where foodid='$foodid' ";
	$go_query=mysqli_query($connection,$query);
	//header("location:productlist.php");
}
 ?>
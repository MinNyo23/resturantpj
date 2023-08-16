<?php
session_start(); 
include('conn.php');
include('function.php');
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<style type="text/css">
 	table, td, th {  
 
  text-align: left;
  border-bottom: 3px solid #003366;
}

 	table {
  border-collapse: collapse;
  width: 100%;
  border-style: 1px solid;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:hover{background-color:#ffcc00}

 	</style>
 	<title></title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="      sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/fontawesome.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body style="background-color: ;background-image: url(../images/background3.jpg);background-size: cover;width: 100%;" class="bg">
 	<?php 
 	include('header.php');
 	 ?>
<br>
<div class="container" style="text-align: center;">
  <a class="btn btn-success" href="product.php" style="text-decoration-style: none;"><i class="fa fa-plus"></i>Add Product</a>
</div>

<div class="container">
	<br>
	<div class="row">
		<table>
		
		<tr>
			<td><b>Photo</td>
			<td><b>Food ID</b></td>
			<td><b>Food Name</b></td>
			<td><b>Category Name</b></td>
			<td><b>Price</b></td>
			<td><b>Quantity</b></td>
			<td><b>Action</b></td>
		</tr>
		<?php 
		  if(isset($_GET['action'])&& $_GET['action']=='delete')
		  {
		  	delproduct ();
		  }
          $query="select food.*,category.* from food,category where food.categoryid=category.catid order by foodid desc " ;
          $go_query=mysqli_query($connection,$query);
         while($row=mysqli_fetch_array($go_query))
         {
         	$foodid=$row['foodid'];
         	$foodname=$row['foodname'];
         	$catname=$row['catname'];
         	$price=$row['price'];
         	$qty=$row['qty'];
         	$photo=$row['photo'];

         	echo "<tr>";
         	echo "<td><img src='../images/{$photo}'width='180'; height='180'></td>";
         	echo "<td><b>{$foodid}</b></td>";
         	echo "<td><b>{$foodname}</b></td>";
         	echo "<td><b>{$catname}</b></td>";
         	echo "<td><b>{$price}</b></td>";
         	echo "<td><b>{$qty}</b></td>";
         	echo "<td><a href='productlist.php?action=delete&pid={$foodid}' style='color:red;'' class='fa fa-trash' onclick=\"return confirm('Are U Sure?')\"> Delete </a> / <a href='edit.php?action=edit&pid={$foodid}' class='fa fa-edit'>Edit</a></td>";
         	echo "</tr>";
         }
		 ?>
		
	</table>
</div> 
</div>
	</div> <!--- main row ---->
</div>  <!--- main container---->
 </body>
 </html>
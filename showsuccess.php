<?php 
session_start();
include('function.php');
include('admin/conn.php');
$orderid=$_SESSION['orderid'];
//echo $orderid;
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
<body style="background-color: ;background-image: url(./images/white.jpg);background-size: cover;">
<?php 
include('header.php')
 ?>
 <div class="container">
	<div class="row">
		<div class="col-sm-12">
	         <div class="card card-header">
		  <h2><span style="color: orange;">Thank U ! </span>
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
			<h5 class="text-center text-success">You successfully ordered the following FOOD.Thanks for your order.</h5>
			</div>
		</div>
	</div>
  <br>
	<div class="row">
    <div class="col-sm-4 offset-4">
  		<table>
  			<tr>
  				<td>
  					<?php 
  					   $query="select * from orders where orderid='$orderid'";
  					   $go_query=mysqli_query($connection,$query);
  					   while($out=mysqli_fetch_array($go_query))
  					   {
  					   	$db_name=$out['deliveryname'];
  					   	$db_phone=$out['deliveryphone'];
  					   	$db_address=$out['deliveryaddress'];
  					   }
  					 ?>
  					 <div class="panel">
  					 	<div class="panel-heading" style="text-align: center;">
							<h3 style="text-align: left;">
								<u>Customer Information<i class='fas fa-info-circle' style='color:blue;'></i></u>
							</h3>  					 		
  					 	</div>
  					 	<div class="panel-body pull-left">
  					 		<p>Customer Name &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user" style='color:blue'></i> = <?php echo $db_name; ?></p>
  					 		<p>Customer phone &nbsp;&nbsp;&nbsp;<i class="fas fa-phone-alt" style='color:blue'></i> = <?php echo $db_phone; ?></p>
  					 		<p>Customer address &nbsp;<i class="fa fa-address-card" style='color:blue'></i> = <?php echo $db_address; ?></p>
  					 	</div>
  					 </div>
            </tr>
  				</td>
        </table>
      </div>
    </div>


  				<div class="row">
            <table class="table table-striped" style="border-style: inset;background-color: black;">
              <tr>
                <td colspan="4"><h5 style="color: yellow;"><b><u>Order information</u></h5></b></td>
              </tr>
              <tr>
              <td><h5 style="color: white;"><b><i>Food Name</i></b></h5></td>
              <td><h5 style="color: white;"><b><i>Food Price</i></b></h5></td>
              <td><h5 style="color: white;"><b><i>Food Quantity</i></b></h5></td>
              <td><h5 style="color: white;"><b><i>Unit Price ($)</i></b></h5></td>
               </tr>
  					   <?php 
  					   	$total=0;
  					   	$query="select orderdetail.*,food.* from orderdetail left join food on orderdetail.foodid=food.foodid where orderid='$orderid'";
  					   	$go_query=mysqli_query($connection,$query);
  					   	while($out = mysqli_fetch_array($go_query)) 
  					   	{
  					   		$foodname=$out['foodname'];
  					   		$price=$out['price'];
  					   		$qty=$out['foodqty'];
  					   		$unitprice=$qty * $price;
  					   		$total+=$unitprice;
  					   		echo "<tr>
  					   		<td><h5 style='color:#2db300;'>{ $foodname }<br></h5> </td>
  					   		<td><h5 style='color:#2db300;'>{ $price }<br></h5></td>
  					   		<td><h5 style='color:#2db300;'>{ $qty }<br></h5></td>
  					   		<td><h5 style='color:#2db300;'>{ $unitprice }<br></h5></td>
  					   		</tr>";

  					   	}
  					    ?>
  					    <tr>
  					    	<td colspan="3" align="right" style="color: red;"><b>Total Amount is :</b></td>
                  <td style="color: blue;"><?php echo $total; ?> <span style="color: white;"> $ </span></td>
  					    </tr>
  					</table> </td></tr></table></div>
  				</td>
  			</tr>
  		</table>		
	</div>
</div>
</body>
</html>
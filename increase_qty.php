<?php
session_start();
include('admin/conn.php');
$id=$_GET['id'];
$query="select qty from food where foodid='$id'";
$go_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($go_query))
{
  $qty=$row['qty'];
  $a=$_SESSION['cart'][$id];
  if($a<$qty){
    $_SESSION['cart'][$id]++;
    header("location:cart.php");
  }
  else
  {
    echo "<script>window.alert('This product is limited today')</script>";
    echo "<script>window.location.href='cart.php'</script>";
  }
}
 ?>
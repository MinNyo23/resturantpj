<?php 
session_start();
$id=$_GET['id'];
unset($_SESSION['cart']);
header("location:cart.php");
 ?>
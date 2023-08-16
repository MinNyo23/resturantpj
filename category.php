<?php 
Session_start();
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
<body style="background-image: url(./images/blur9.png);background-size: cover;">

  <?php
     include('header.php');
     ?>


<div class="container">
  <div class="row">
    <div class="col-sm-12">
      
      <div class="container">
        <div class="row" style="text-align: left;">
          <?php
          include('catsidebar.php');
           ?>
        </div>
        <br>
      </div>
       
      <div class="row">
       
        <div class="col-sm-12-offset-1 row">
          <?php
          if(isset($_GET['page'])){
            $page = $_GET['page'];
            $showproduct = ($page * $perpage)-$perpage;
          }
          if(!isset($_GET['page'])){
            $showproduct = 0;
          }
          $cid=$_GET['cid'];
          $query = "select * from food where categoryid='$cid'";
          $go_query = mysqli_query($connection,$query);
          $countresult = mysqli_num_rows($go_query);
          if($countresult==0){
            echo "<div class=\"card card-header\">Sorry, no result found<a href=\"index.php\">Back</a></div>";
          }
          elseif($countresult>0){
            while($row = mysqli_fetch_array($go_query)){
              $foodid = $row['foodid'];
              $foodname = $row['foodname'];
              $categoryid = $row['categoryid'];  
              $price = $row['price'];
              $qty = $row['qty'];
              $photo = $row['photo'];
              $display = '<div class="col-sm-3"><div class="card-deck mb-3 text-center "><div class="card bg-dark shadow-sm"><div class="thumbnail">';
              $display.= "<img src='./images/{$photo}' width='180' height='155' style='padding-top:8px;'>";
              $display.= "<div class='caption'>";
              $display.= "<h4 style='color:white;'>{$foodname}</h4>";
              $display.= "<p style='color:white;'>Price = {$price}$</p>";
              $display.= '<p class="text-center"><a href="addtocart.php?id='.$foodid.'" class="btn btn-primary">
              <i class="fas fa-shopping-cart"> Add to Cart </i></a></p>';
              $display.= "</div></div></div></div></div>";
              echo $display;
          }
        }
           ?>
        </div>
      </div>
    </div>
  </div>
</div>
  </body>
</html>
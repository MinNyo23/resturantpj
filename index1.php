<?php 
//session_start();
include('function.php');
include('admin/conn.php');
$get_query="select * from food";
$perpage=9;
$go_query=mysqli_query($connection,$get_query);
$num=mysqli_num_rows($go_query);
$num=ceil($num/$perpage);
$page='';
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

    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      .container{
      margin: auto;
      max-width: 90%;
      padding: 15vh;
      background: white;
      border-radius: 10px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.3);
      text-align: center;
      margin-bottom: 24px;
      color: #222;
      border:1px solid silver;
      margin: 10px 0 18px 0;     
    }
    .container .fas fa-shopping-cart{
      margin-left: 50%;
      transform: translateX(-50%);
      width: 120;
      height: 34px;
      border: none;
      outline: none;
      background: #27a327;
      cursor: pointer;
      font-size: 16px;
      text-transform: uppercase;
      color: white;
      border-radius: 4px;
      transition: .3s;
    }
    </style>
</head>
<body style="background-color: skyblue;">

  <?php
     include('header.php');
     ?>


<div class="container">
  <div class="row">
    <div class="col-sm-12">
      
      <div class="container">
        <div class="row" style="text-align: left;">
          <?php
          include('sitebar.php');
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
          $query = "select * from food limit $showproduct,$perpage";
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
              $display.= "<p style='color:white;'>{$price}</p>";
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

<ul class="pagination justify-content-center" style="margin:20px 0;">
  <?php
  for($i=1;$i<=$num;$i++){
    if($i==$page){
  echo "<li class=\"page-item\"><a href=\"index.php?page={$i}\" class=\"page-link\">{$i}</a></li>";
  }
  else{
    echo "<li class=\"page-item\"><a href=\"index.php?page={$i}\" class=\"page-link\">{$i}</a></li>";
  }
}
  ?>
</ul>


  </body>
</html>
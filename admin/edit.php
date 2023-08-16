<?php
session_start(); 
include('conn.php');
include('function.php');
 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">

    .bg{
      background-image: url('../images/product1.jpg');
      background-size: cover;
      background-color: skyblue;
    }
    .img{
      padding-top: 25px;
      padding-left: 200px;      
      padding-right: 30px;
    }
    .container{
     position: relative;
  max-width: 800px;
  margin: 0 auto;
    }
    .container .content {
  position: absolute;
  bottom: 0;
  color: #f1f1f1;
  width: 65%;
  padding-bottom: 35px;
  padding-left: 350px;
}
input[type=text]:focus {
  background-color: black;
  color: white;
}
<!------------------>
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="    sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/fontawesome.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body bgcolor="black" class="bg"> 

  <?php 
include('header.php');
   ?>

  <?php 
      if(isset($_GET['action'])&& $_GET['action']=='edit') 
     {
         $pid=$_GET['pid'];
         $query="select * from food,category where foodid='$pid'";
         $go_query=mysqli_query($connection,$query) ;
         while ($row=mysqli_fetch_array($go_query))
         {
          $foodid=$row['foodid'];
          $foodname=$row['foodname'];
          $categoryid=$row['categoryid'];
          $price=$row['price'];
          $qty=$row['qty'];
          $photo=$row['photo'];
         }
     }
   ?>

  <div class="container">
    <img src="../images/product4.jpg" width="80%" height="550px" class="img">
<div class="content">
          <?php 
                     if (isset($_POST['updateproduct']))
                     {
                      updateproduct();
                     }
           ?>

                  <form class="form" action="#" method="post" enctype="multipart/form-data">                      
                        <div class="form-group">
                          <h5 style="color: black;font-family: Georgia, serif;"><u>Food Name</u></h5>
                            <input type="text" name="foodname" class="form-control" value="<?php echo $foodname; ?>" />
                        </div>
                      <div class="form-group">
                          <h5 style="color: black;font-family: Georgia, serif;"><u>Category Name</u></h5>
                          <select name="categoryid" class="form-control">
                              <?php 
                                   $query="select * from category" ;
                                   $go_query=mysqli_query($connection,$query);
                                   while($row=mysqli_fetch_array($go_query)) 
                                   {
                                    $catid=$row['catid'];
                                    $catname=$row['catname'];
                                    if ($categoryid==$catid) 
                                    {
                                      echo "<option value={$catid} selected > {$catname} </option>" ;
                                    }
                                    echo "<option value={$catid}> {$catname} </option>" ;
                                   }
                                ?>
                </select>
                        </div>
                        <div class="form-group">
                          <h5 style="color: black;font-family: Georgia, serif;"><u>Price</u>($)</h5>
                        <input type="text" name="price" class="form-control" style="font-style: blue;" value="<?php echo $price; ?>">
                        </div>

                        <div class="form-group">
                          <h5 style="color: black;font-family: Georgia, serif;"><u>Quantity</u></h5>
                          <input type="text" name="quantity" class="form-control" value="<?php echo $qty; ?>">
                        </div>

                        <div class="form-group">
                        <h5 style="color: black;font-family: Georgia, serif;"><u>Take Photo</u>
                        <input type="file" name="photo" ></h5>
                        
                        </div>

                        <button type="submit" name="updateproduct" class="btn btn-success btn-block"
                         style="color: black;width: 40%;font-family: Georgia, serif;" >Update Food</button>
                      </div>
                    </form>
                  </div>
  </div>
  <?php 
include('footer.php');
   ?>
</body>
</html>
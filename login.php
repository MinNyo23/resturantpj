<?php
session_start(); 
include('function.php');
include('admin/conn.php');
if(isset($_POST['login']))
{
  $name=$_POST['username'];
  $password=$_POST['password'];
  $error=array(
     'username'=>'',
     'password'=>''
  );
    if($name=='')
    {
      $error ['username']='This field could not be empty';
    }
    if($password=='')
    {
      $error ['password']='This field could not be empty';
    }
    $hpass=md5($password);
    $query="select * from user";
    $go_query=mysqli_query($connection,$query);
    while($out=mysqli_fetch_array($go_query))
    {
      $db_user_name=$out['username'];
      $db_password=$out['password'];
      $db_user_role=$out['role'];
      if($db_user_name==$name & $db_password==$hpass &$db_user_role=='admin')
      {
        $_SESSION['admin']=$name;
        header('location:admin/product.php');
      }
      elseif($db_user_name==$name & $db_password==$hpass)
      {
          $_SESSION['user']=$name;
          header('location:index.php');
      }
      else if($db_user_name!=$name && $db_password!=$hpass)
      {
        $error ['incorrect']='Incorrect username or password';
      }
    }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    .bg{
      background-image: url('./images/login4.jpg');
      background-size: cover;
    }
    p{
      margin:0px;
      padding:0px;
      color:red;
    }
  </style>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg">
  <header class="header1">
    <div class="main">
      <div class="logo">
        <img src="./images/logo1.png">
      </div>
      <ul>
        <li><a href="home.php">Home</a> </li>
        <li><a href="menu.php">Menu</a> </li>
        <li><a href="contact.php">Contact</a> </li>
        <li><a href="about.php">About</a> </li>
        <li><a href="register.php">Register</a> </li>
      </ul>
    </div>

  </header>
  
  <div class="login-box">
    <form class="form" action="#" method="post">
      <h1>Login</h1>
      <div class="textbox" style="border:none;">
      <p class="text-danger"><?php echo isset($error['incorrect'])?$error['incorrect']:'' ?></p>
      </div>
      <div class="textbox">        
        <label>Enter Username</label>
        <i class="fa fa-user" aria-hidden="true"></i>  
        <input class="txt" type="text" placeholder="" name="username">
      </div>
      <p class="text-danger"><?php echo isset($error['username'])?$error['username']:'' ?></p>
      <div class="textbox">
        <label>Enter Password</label>
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input class="txt" type="password" placeholder="" name="password">
      </div>
      <p class="text-danger"><?php echo isset($error['password'])?$error['password']:'' ?></p>
      <div>
        <button type="submit" name="login" class="btn">Sign in</button>
      <label style="text-align: center;"><a href="register.php" style="text-align: center;color: white;" > Create Account </a></label>
      </div>
  </div>
</form>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


</body>
</html>
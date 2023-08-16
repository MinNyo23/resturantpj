<?php 
include('function.php');
include('admin/conn.php');
if(isset($_POST['register']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$error=array(
      'username'=>'',
      'password'=>'',
      'confirmpassword'=>'',
      'matchpassword'=>'',
      'email'=>'',
      'phone'=>'',
      'address'=>'',
	);
	if($username=='')
	{
		$error['username']='Username must be enter';		
	}
	else
	{
		if(strlen($username)<3)
		{
			$error['username']='Username need to be longer';
		}
	}
	if($password=='')
	{
		$error['password']='Password must be enter';
	}
	else
	{
		if(strlen($password)<6){
			$error['password']='Password need to be longer';
		}
	}
	if($confirmpassword=='')
	{
		$error['confirmpassword']='Confirmpassword must be enter';
	}
	else
	{
		if($password!=$confirmpassword){
			$error['matchpassword']='Password do not match';
		}
	}
	if($email==''){
		$error['email']='E-mail must be enter';
	}
	if($phone==''){
		$error['phone']='Phone must be enter';
	}
	if($address==''){
		$error['address']='Address must be enter';
	}
    foreach ($error as $key => $value) {
	if(empty($value)){
		unset($error[$key]);
	}
}
    if(empty($error)){
	    create_accu();
    }
} 
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link  rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
  .bg{
	 background-image: url('./images/regphoto.jpg');
  background-size: cover;
  width: 100%;
  font-family: monospace;
  color: white;
  background-position: center;
  background-attachment: fixed;
  background: rgba(100, 50%, 0.8);
  }
  	
  div{
  background-image: url('./photo/regphoto.jpg');
  background-size: cover;
  width: 100%;
  font-family: monospace;
  color: white;
  background-position: center;
  background-attachment: fixed;
  background: rgba(100, 50%, 0.8);
}
label{
    font-size: 16px;
    font-weight: normal;
}
.form-control{
  background: transparent;
  border: 0px;
  border-radius: 0px;
  border-bottom: 2px solid white;
  font-size: 20px;
  color: white;
}
h5{
  margin-top: 30px;
}
#black{
  margin-top: 10px;
  background: rgba(0, 0, 1, 0.1);
  border-radius: 20px;
}

    </style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head> 
<body class="bg">
  <header class="header1">
    <div class="main">     
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="menu.php">Menu</a> </li>
        <li><a href="contact.php">Contact</a> </li>
        <li><a href="../Pages/about.html">About</a> </li>
        <li><a href="login.php">LOGIN</a> </li>
      </ul>
    </div>
  </header>

<div class="container">

     <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-5" id="black">
              <div class="text-center">
                 <h3>Create Your Admin Account<br></h3>
              </div>
          <form method="post" action="#">
              <div class="form-group">
              <label>User Name</label>
              <input type="text" name="username" class="form-control" value="<?php if(isset($username)){echo $username;} ?>" placeholder="Enter Your User Name" />
              <label class="text-danger"><?php echo isset($error['username'])?$error['username']:'' ?></label>
              </div>

              <div class="form-group">
              <label>Password</label> 
              <input type="password" name="password" class="form-control" value="<?php if(isset($password)){echo $password;} ?>" placeholder="Enter Your Password" />
              <label class="text-danger"><?php echo isset($error['password'])?$error['password']:'' ?></label>
              </div>

              <div class="form-group">
              <label>Confirmpassword</label>
              <input type="password" name="confirmpassword" class="form-control" value="<?php if(isset($password)){echo $password;} ?>" placeholder="Enter Your Confirm Password" />
              <label class="text-danger"><?php echo isset($error['confirmpassword'])?$error['confirmpassword']:'' ?></label>
			        <label class="text-danger"><?php echo isset($error['matchpassword'])?$error['matchpassword']:'' ?></label>
              </div>

              <div class="form-group">
              <label>E-mail</label>
              <input type="email" name="email" class="form-control" value="<?php if(isset($phone)){echo $phone;} ?>" placeholder="Enter E-mail" />
              <label class="text-danger"><?php echo isset($error['email'])?$error['email']:'' ?></label>
              </div>

              <div class="form-group">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control" placeholder="Enter Your Admin Phone" />
              </div>

              <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control"  name="address" value="<?php if(isset($address)){echo $address;} ?>" placeholder="Enter Address"></textarea>
                  <label class="text-danger"><?php echo isset($error['address'])?$error['address']:'' ?></label>
              </div>

              <div style="text-align: center;">
                  <button type="submit" name="register" class="btn btn-success" style="width: 25%;"> Sign In</button>
              <div>
<br>
                               
                <input type="reset" name="btnreset" value="Reset" class="btn btn-primary" style="width: 25%;">
          </form>  <!---form ---->
      </div> <!---div col-md-6 --->
    </div> <!---div row--->
     
</div>   <!---div container--->
</body>
</html>
<?php 
include('conn.php');
include('function.php');
$catname="";
 ?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	.table,tr,td
		 {
       border: 1px solid black;
       border-collapse: collapse;
          }
    .bg{
      background-image: url('../images/background.jpg');
   background-size: cover;
      }
      input[type=text]:focus {
  background-color: ;
}
	</style>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="    sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/fontawesome.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body class="bg">

<?php 
include ('header.php');
 ?>

<?php
if (isset($_POST['addcategory']) ) 
{
	insertcategory();
}
 ?>

 <div class="container">
 	<div class="row">

 		<div class="col-md-6">   <br>
 		    <div class="card">
 			      <div class="card card-header bg-dark">
 				     <h4 class="text-center" style="color:#33CC33"><i class='fas fa-tasks' style='font-size:25px;color:#33CC33'></i> Food Category </h4>
 			     </div>
           <form class="" method="post">
 			     <div class="card card-body" style="background-color: #b3d9ff;">			     
                    <h5 align="center"><b>Category Name</b>    &nbsp;
                    <input type="text" class="" name="catname">
                    </h5>
 			        
 			     </div>
 			    <div class="card card-footer bg-dark">
 			    	<div style="text-align: center;">
 				     <button type="submit" name="addcategory" class="btn btn-success" style="width: 25%;">Add Category</button>
 				 </div>
 			    </div>

 			        <?php 
                  if(isset($_GET['action']) && $_GET['action']=='edit') 
                  {
                  	$catid =$_GET['cid'];
                  	$query= "select * from category where catid='$catid' ";
                  	$go_query= mysqli_query($connection,$query) ;
                  	while($out = mysqli_fetch_array($go_query))
                  	{
                  		$catname =$out ['catname'] ;
                  	}
                  }
				       ?>

 			    </form>
		   </div>   <!--- div card---->
		</div>  <!--- div col-md-6 --->

		   <br>

          <?php 
                 if (isset($_POST['updatecategory']))
                 {
                  updatecategory();
                 }
          ?>
            
          <div class="col-md-6"> <br>
       <div class="card">
               <div class="card card-header bg-dark">
                      <h4 class="text-center" style="color: #5a80f2">
                      	<i class='fas fa-tasks' style='font-size:25px;color:#3366FF'></i> Food Category </h4>
               </div>
                <div class="card card-body" style="background-color: #b3d9ff;">
                    <form class="" method="post">
                       <h5 align="center"><b>Update Category Name</b>    &nbsp;
                       <input type="text" class="" name="catname" value="<?php echo $catname ?>">
                       </h5>             
                </div>      
                <div class="card card-footer bg-dark">
                	<div style="text-align: center;">
                    <button type="submit" name="updatecategory" class="btn btn-primary" style="width: 30%">Update Category</button>
                </div>
                </div>
                </form>
       </div>
 		</div>  <!--- div col md 6---->

 	</div> <!---main row Div--->
 </div>  <!---- main container Div--->
     <!----------------------------------->
     <br><br>
 		<div class="container">
 		<div class="row">  <br>
 			<table class="table table-hover" style="background: transparent;">
					<tr align="left" style="color: white;font-size: 20px;">
						<td class="bg-dark">No</td>
						<td class="bg-dark">Category</td>
						<td class="bg-dark">Action</td>
					</tr>

 <?php 
             if (isset($_GET['action'] ) && $_GET['action']=='delete') 
             {
             	delcategory(); 
             }
          $query="select * from category order by catid desc";
					$go_query = mysqli_query($connection,$query);
					while ($row=mysqli_fetch_array($go_query))
					{
						$catid=$row['catid'];
						$catname=$row['catname'];
						
						echo "<tr>";
						echo "<td style='color:white'>{$catid}</td>";
						echo "<td style='color:white'>{$catname}</td>";    
						echo "<td><a href='category.php?action=delete&cid={$catid}' style='color:red' class='fa fa-trash' onclick=\"return confirm('Are U Sure?')\"> Delete </a> / <a href='category.php?action=edit&cid={$catid}' class='fa fa-edit'>Edit</a></td>";
						echo "</tr>";
                    }
     ?>

				</table>
 		</div>
 	</div> <!---main row Div--->
 </div>  <!---- main container Div--->
</body>
</html>
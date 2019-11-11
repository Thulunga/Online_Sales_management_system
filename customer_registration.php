<?php  
	include('includes/db.php');
	include('functions/functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
	<div id="top"><!--top bar start-->
		 <div class="container">
		 	<div class="col-md-6 offer">
		 		<a href="#" class="btn btn-success btn-sm">
		 			Welcome Guest
		 		</a>
		 		<a href="#">Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total Items <?php countcartPro(); ?></a>
		 	</div>
		 	<div class="col-md-6">
		 		<ul class="menu">
		 			<li><a href="customer_registration.php">Register</a></li>
		 			<li><a href="contactuc.php">contact us</a></li>
		 			<li><a href="cart.php">Goto Cart</a></li>
		 			<li><a href="login.php">Login</a></li>
		 		</ul>
		 	</div>
		 </div>

	</div><!-- top bar end-->


<!-------**************************************************-->
	<div class="navbar navbar-default" id="navbar">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand home" href="index.php">
					<img src="images/mylogo.png" alt="InspireShoping" class="hidden-xs">
					<img src="images/mylogo.png" alt="InspireShoping" class="visible-xs">
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button name="search" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only"></span>
					<i class="fa fa-search"></i>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navigation">
				<div class="padding-nav">
					<ul class="nav navbar-nav navbar-left">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="shop.php">Shop</a></li>
						<li><a href="customar/my_account.php">My Account</a></li>
						<li><a href="cart.php">Shoping Cart</a></li>	
						<li><a href="about.php">About Us</a></li>
						<li><a href="services.php">Services</a></li>
						<li><a href="contactus.php">Contact Us</a></li>
					</ul>
				</div>
				<a href="cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span><?php countcartPro(); ?> items in the cart</span>
				</a>
				<div class="navbar-collapse collapse right">
					<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only"> Toggle Search</span>
						<i class="fa fa-search"></i>
						
					</button>
				</div>
				<div class="collapse clearfix" id="search">
					<form class="navbar-form" method="get"  action="result.php">
						<div class="input group">
							<input type="text" name="user query" placeholder="Search" class="form-control" required="">
								<button type="submit" value="Search" name="search" class="btn btn-primary">
										<i class="fa fa-search"></i>
							</button>
						</div>						
					</form>
				</div>
			</div>			
		</div>
	</div>


	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Shop</li>
				</ul>
			</div>

			<div class="col-md-9">
				<div class="box">
					<div class="box-header">
						<center>
							<h2>Registaer a new Account</h2>
						</center>
					</div>
					<form action="customer_registration.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Customer Name</label>
							<input type="text" name="c_name" required="" placeholder="Customer Name" class="form-control">
						</div>
						<div class="form-group">
							<label>User Name/User Id</label>
							<input type="text" name="c_id" required="" placeholder="Customer user Name" class="form-control">
						</div>
						<div class="form-group">
							<label>Customer Email</label><p><span style="color:red">*</span>correct email id is important to get conatct from the customers</p>
							<input type="text" placeholder="Customer Email ID" name="c_email" required="" class="form-control">
						</div>

						<div class="form-group">
							<label>Customer Password</label>
							<input type="Password" name="c_password" placeholder="Password" required="" class="form-control">
						</div>
<!--
						<div class="form-group">
							<label>Customer User Name</label>
							<input type="text" name="username" placeholder="User Name" required="" class="form-control">
						</div>---->

						<div class="form-group">
							<label>Customer Password</label>
							<input type="Password" name="checkpassword" placeholder="Re-enter your Password" required="" class="form-control">
						</div>
						<div class="form-group">
							<label>Country</label>
							<input type="text" name="c_country" placeholder="Country" required="" class="form-control">
						</div>
						<div class="form-group">
							<label>City</label>
							<input type="text" name="c_city" placeholder="City Name" required="" class="form-control">
						</div>
						<div class="form-group">
							<label>Contact number</label>
							<input type="text" name="c_number" placeholder="Contact Number" required="" class="form-control">
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="c_address" placeholder="Address" required="" class="form-control">
						</div>
					<!--	<div class="form-group">
							<label>Profile Image</label>
							<input type="file" name="c_image"  required="" class="form-control">
						</div>-->

						<div class="text-center">
							<button type="submit" name="register-submit" class="btn  btn-primary">
								<i class="fa fa-user-md"></i>
								Register
							</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<?php
				include("includes/sidebar.php");
			  	?>
			</div>	

		</div>
	</div>


	<?php 
	include("includes/footer.php");
	 ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php 

if (isset($_POST['register-submit'])) {
	$c_name = $_POST['c_name'];
	$c_userId = $_POST['c_id'];
	$c_email = $_POST['c_email'];
	$c_password = $_POST['c_password'];
	$c_checkpassword = $_POST['checkpassword'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_number = $_POST['c_number'];
	$c_address = $_POST['c_address'];
	//$c_image = $_FILES['c_image']['name'];
	//$c_temp_image = $_FILES['c_image']['tmp_name'];
	$c_ip = getUserIP();

////////////////////////////////////////////////////////////////
	if (!filter_var($c_email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $c_userId)) {
	echo "
	<script>alert('emailid and userid not valid');</script>
	<script>window.open('customer_registration.php?error=emailuserisnotvalid','_self')</script>
	";
	}
	elseif (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
		echo "
		<script>alert('emailid not valid');</script>
		<script>window.open('customer_registration.php?error=emailnotvalid','_self')</script>
		";
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $c_userId)) {
		echo "
		<script>alert('envalid username');</script>
		<script>window.open('customer_registration.php?error=useridnotvalid','_self')</script>
		";
	}
	elseif ($c_password !== $c_checkpassword) {
		echo "
		<script>alert('Password do not match');</script>
		<script>window.open('customer_registration.php?error=passwordnotmatch','_self')</script>
		";
	}
	else{
		$sql = "select customer_username from customers where customer_username = ?";
	  	$stmt = mysqli_stmt_init($con);
	  	if (!mysqli_stmt_prepare($stmt, $sql)) {
	  		echo "
			<script>alert('SQL error');</script>
			<script>window.open('customer_registration.php?error=sqlerror','_self')</script>
			";
  		}
  		else{
	  		mysqli_stmt_bind_param($stmt,"s",$c_userId);
	  		mysqli_stmt_execute($stmt);
	  		mysqli_stmt_store_result($stmt);
	  		$resultCheck = mysqli_stmt_num_rows($stmt);
	  		if ($resultCheck > 0) {
	  			echo "
				<script>alert('Username already Taken');</script>
				<script>window.open('customer_registration.php?error=usernametaken','_self')</script>
				";
	  		}
	  		else{
	  			/////////////////////////////////////////////////////////////////////////
	  			$sql = "select customer_username from customers where customer_email = ?";
	  			$stmt = mysqli_stmt_init($con);
	  			if (!mysqli_stmt_prepare($stmt, $sql)) {
	  				echo "
					<script>alert('SQL error');</script>
					<script>window.open('customer_registration.php?error=sqlerror','_self')</script>
					";
  				}
  				else{
			  		mysqli_stmt_bind_param($stmt,"s",$c_email);
			  		mysqli_stmt_execute($stmt);
			  		mysqli_stmt_store_result($stmt);
			  		$resultCheck = mysqli_stmt_num_rows($stmt);
			  		if ($resultCheck > 0) {
			  			echo "
						<script>alert('Email Id Already Taken');</script>
						<script>window.open('customer_registration.php?error=emailidtaken','_self')</script>
						";
			  		}
			  		else{
						//move_uploaded_file($c_temp_image, "customar/customar_images/$c_image");
						  $insert_user = "insert into customers(customer_name,customer_username,customer_email,
						  customer_pass,customer_country,customer_city,customer_contact,customer_add,customer_ip) values(?,?,?,?,?,?,?,?,?)";
						 
			  			$stmt = mysqli_stmt_init($con);
			  			if (!mysqli_stmt_prepare($stmt, $insert_user)) {
			  				echo "
							<script>alert('SQL error');</script>
							<script>window.open('customer_registration.php?error=sqlerror','_self')</script>
							";
			  			}
			  			else{
			  				$hashedPwd = password_hash($c_password, PASSWORD_DEFAULT);
			  				mysqli_stmt_bind_param($stmt,"sssssssss",$c_name,$c_userId,$c_email,$hashedPwd,$c_country,$c_city,$c_number,$c_address,$c_ip);
			  				mysqli_stmt_execute($stmt);
			  				echo "
								<script>alert('SignUp successfull...Go to Login page');</script>
								<script>window.open('customer_registration.php?signup=successfull','_self')</script>
								";
			  			}
			  		}

			  	}
	  		}
		}
	}

}


?>
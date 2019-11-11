<?php  
	session_start();
	include('includes/db.php');
	include('functions/functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
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
				 <?php
				 if(isset($_SESSION['userName'])){
					 $name = $_SESSION['userName'];
					 echo "Welcome $name";
				 }
				 else{
					 echo "Welcome Guest";
				 }
				 ?>
		 		</a>
		 		<a href="#">Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total Items <?php countcartPro(); ?></a>
		 	</div>
		 	<div class="col-md-6">
		 		<ul class="menu">
				 <?php
				 if(isset($_SESSION['userName'])){
					 echo "
					 <li><a href='customar/my_account.php'>My Account</a></li>
		 			<li><a href='cart.php'>Goto Cart</a></li>
		 			<li><a class='btn btn-warning' href='includes/logout.inc.php'>Logout</a></li>
					 ";
				 }
				 else{
					 echo "
					 <li><a href='customer_registration.php'>Register</a></li>
					 <li><a href='cart.php'>Goto Cart</a></li>
					<li><a class='btn btn-warning' href='login.php'>Login</a></li>
					 ";
				 }
				 ?>
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
						<li><a href="index.php">Home</a></li>
						<li><a href="shop.php">Shop</a></li>
						<li><a href="customar/my_account.php">My Account</a></li>
						<li><a href="cart.php">Shoping Cart</a></li>	
						<li><a href="about.php">About Us</a></li>
						<li><a href="services.php">Services</a></li>
						<li class="active"><a href="contactus.php">Contact Us</a></li>
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
							<h2>Contact Us</h2>
							<p class="text-muted">If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.</p>
						</center>
					</div>
					<form action="contactus.php" method="post">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" required="" class="form-control">
						</div>
						<div class="form-group">
							<label>Email</label><p><span style="color:red">*</span>correct email id is important to recive email from us about your problems</p>
							<input type="text" name="email" required="" class="form-control">
						</div>
						<div class="form-group">
							<label>Subject</label>
							<input type="text" name="subject" required="" class="form-control">
						</div>
						<div class="form-group">
							<label>Massage</label>
							<textarea name="massage" required="" class="form-control"></textarea> 
						</div>
						<div class="text-center">
							<button type="submit" name="submit" class="btn  btn-primary">
								<i class="fa fa-user-md"></i>
								Send Massage
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


if (isset($_POST['submit'])) {
	$senderName = $_POST['name'];
	$senderEmail = $_POST['email'];
	$senderSubject = $_POST['subject'];
	$senderMassage = $_POST['massage'];
	$reciverEmail = "thulunga_b170399cs@nitc.ac.in";
	mail($reciverEmail, $senderSubject, $senderMassage, $senderEmail);
	//customer mail
	$subject = "Wellcome our web site.";
	$msg = "we shall get back to you soon, thanks for contacting us";
	mail($senderEmail, $subject, $msg, $reciverEmail);
	echo "<h1>Your mail has been sent.....</h1>";

}



?>
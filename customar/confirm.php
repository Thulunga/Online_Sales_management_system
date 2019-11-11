<?php  
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
		 			Welcome Guest
		 		</a>
		 		<a href="#">Shopping Cart Total Price: INR 100, Total Items 2</a>
		 	</div>
		 	<div class="col-md-6">
		 		<ul class="menu">
		 			<li><a href="../customer_registration.php">Register</a></li>
		 			<li><a href="#">My Account</a></li>
		 			<li><a href="../cart.php">Goto Cart</a></li>
		 			<li><a href="../login.php">Login</a></li>
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
						<li><a href="../index.php">Home</a></li>
						<li><a href="../shop.php">Shop</a></li>
						<li class="active"><a href="#">My Account</a></li>
						<li><a href="../cart.php">Shoping Cart</a></li>	
						<li><a href="../about.php">About Us</a></li>
						<li><a href="../ervices.php">Services</a></li>
						<li><a href="../contactus.php">Contact Us</a></li>
					</ul>
				</div>
				<a href="cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span>4 items in the cart</span>
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
					<li>My Account</li>
				</ul>
			</div>
			<div class="col-md-3">
				<?php
				include("includes/sidebar.php");
			  	?>
			</div>
			<div class="col-md-9">
				<div class="box">
					<h1 align="center">Please Confirm Your payment</h1>
					<form action="confirm.php" method="post" enctype="multipart/form-data"></form>
					<div class="form-group">
						<label>Invoice Number</label>
						<input class="form-control" required="" type="text" name="invoice_number">
					</div>
					<div class="form-group">
						<label>Amount</label>
						<input class="form-control" required="" type="text" name="amount">
					</div>
					<div class="form-group">
						<label>Select Pyment Mode</label>
						<select class="form-control" name="payment_mode">
							<option>Bank Transfer</option>
							<option>Papal</option>
							<option>Cart Paymenet</option>
							<option>Upi transfer</option>
						</select>
					</div>
					<div class="form-group">
						<label>Transection Number</label>
						<input class="form-control" required="" type="text" name="trfr_number">
					</div>
					<div class="form-group">
						<label>Payment Date</label>
						<input class="form-control" required="" type="date" name="date">
					</div>
					<div class="text-center">
						<button class="btn btn-primary" type="submit" name="confirm_payment">Confirm Payment</button>
					</div>
				</div>
			</div>


		</div>
	</div>


	<?php 
	include("includes/footer.php");
	 ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
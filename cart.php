<?php  
	session_start();
	include('includes/db.php');
	include('functions/functions.php');
?>


<?php
if(!isset($_SESSION['userName'])){
	echo "
		<script>alert('Please login to View your Cart');</script>
		<script>window.open('login.php','_self')</script>
		";
}
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
						<li class="active"><a href="cart.php">Shopping Cart</a></li>	
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
				<li>Cart</li>
			</ul>
		</div>
		<?php
		if (isset($_GET['checkout'])) {
			include('includes/checkout.view.php');
		}
		else{
			include('includes/cart.view.php');
		}


		?>



<!----****************************oredr summary section*********************************************---->
		<div class="col-md-3">
			<div class="box" id="order-summary">
				<div class="box-header">
					<h3>Order Summary</h3>
				</div>
				<p class="text-muted">Shipping and additional cost are calculated based on the value you have entered</p>
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td>Order Subtotal</td>
								<th>INR <?php totalPrice(); ?></th>
							</tr>
							<tr>
								<td>Shipping and handling</td>
								<td>INR 0</td>
							</tr>
							<tr>
								<td>Tax</td>
								<td>INR 0</td>
							</tr>
							<tr class="total">
								<td>Total</td>
								<th>INR <?php totalPrice(); ?></th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

<!----************************************************************************************************---->
<!----**********************You amy also like *************************************************---->

		<div class="col-md-9">
			<div id=" row same-height-row">
				<div class="col-md-3">
					<div class="box same-height headline">
						<h3 class="text-center"> You amy also like this products</h3>
					</div>
				</div>
				<?php  

				getProYouMayAlsoLike();

				?>
			</div>
		</div>

		
		


	</div>
</div>

<!-- footer starts -->








<?php 
include("includes/footer.php")
 ?>

<!--  footer ends -->

<!--  -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>























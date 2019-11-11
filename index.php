<?php
	session_start();
	include('includes/db.php');
	include('functions/functions.php');
?>


 <!DOCTYPE html>
<html>
<head>
	<title>E comerce Store</title>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="shop.php">Shop</a></li>
						<li><a href="customar/my_account.php">My Account</a></li>
						<li><a href="cart.php">Shopping Cart</a></li>	
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

<div class="container" id="slider">
	<div class="col-md-12">
		<div class="carousel slide" id="myCarousel" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="myCarousel" data-slide-to="1"></li>
				<li data-target="myCarousel" data-slide-to="2"></li>
				<li data-target="myCarousel" data-slide-to="3"></li>
				<li data-target="myCarousel" data-slide-to="4"></li>
			</ol>
			<div class="carousel-inner">
				<?php 
				$get_slider="select * from slider Limit 0,1";
				$run_slider = mysqli_query($con, $get_slider );
				 while ($row = mysqli_fetch_array($run_slider)){
				 	$slider_name = $row['slider_name'];
				 	$slider_image = $row['slider_image'];

				 	 echo "<div class='item active'>
					<img alt='slider_name' src='admin_area/slider_images/$slider_image'>
				</div>";
				 }
				 ?>
				 <?php  
				 $get_slider = "select * from slider Limit 1,5";
				 $run_slider = mysqli_query($con, $get_slider);
				 while ($row = mysqli_fetch_array($run_slider)){
				 	$slider_name = $row['slider_name'];
				 	$slider_image = $row['slider_image'];
				 	echo 	"<div class='item'>
								<img alt='slider_name' src='admin_area/slider_images/$slider_image'>
							</div>";
				 }

				 ?>


			</div>
			<a href="#myCarousel" class="left carousel-control" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left">
				</span>
				<span class="sr-only">Previous</span>
			</a>
			<a href="#myCarousel" class="right carousel-control" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right">
				</span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>
<div class="advantage">
	<div class="container">
		<div class="same-height-row">
			<div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<h3><a href="#">BEST PRICE</a></h3>
					<p>Thulunga Basumatary is creating this ecommerce site using php and html and css and mysql</p>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<h3><a href="#">NO 1 OR THE ONLY ONE</a></h3>
					<p>Thulunga Basumatary is creating this ecommerce site using php and html and css and mysql</p>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<h3><a href="#">100% QUALITY PRODUCT</a></h3>
					<p>Thulunga Basumatary is creating this ecommerce site using php and html and css and mysql</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="hot">
	<div class="box">
		<div class="container">
			<div class="col-md-12">
				<h2>Latest This Week</h2>
			</div>
		</div>
	</div>
</div>

<div id="content" class="container">
	<div class="row">
		<?php  
		getPro();

		?>


		
		<!----------------******************------>
		<!---
		<div class="col-sm-4 col-sm-6 single">
			<div class="product">
				<a href="details.php">
					<img src="admin_area/product_images/product1.jpg" class="img-responsive">
				</a>
				<div class="text">
					<h3><a href="details.php">RUBICKS CUBE 2x2</a></h3>
					<p class="price">INR 299</p>
					<p class="buttons">
						<a href="details.php" class="btn btn-default">View Details</a>
						<a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart">Add to Cart</i></a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-sm-6 single">
			<div class="product">
				<a href="details.php">
					<img src="admin_area/product_images/product1.jpg" class="img-responsive">
				</a>
				<div class="text">
					<h3><a href="details.php">RUBICKS CUBE 2x2</a></h3>
					<p class="price">INR 299</p>
					<p class="buttons">
						<a href="details.php" class="btn btn-default">View Details</a>
						<a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart">Add to Cart</i></a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-sm-6 single">
			<div class="product">
				<a href="details.php">
					<img src="admin_area/product_images/product1.jpg" class="img-responsive">
				</a>
				<div class="text">
					<h3><a href="details.php">RUBICKS CUBE 2x2</a></h3>
					<p class="price">INR 299</p>
					<p class="buttons">
						<a href="details.php" class="btn btn-default">View Details</a>
						<a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart">Add to Cart</i></a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-sm-6 single">
			<div class="product">
				<a href="details.php">
					<img src="admin_area/product_images/product1.jpg" class="img-responsive">
				</a>
				<div class="text">
					<h3><a href="details.php">RUBICKS CUBE 2x2</a></h3>
					<p class="price">INR 299</p>
					<p class="buttons">
						<a href="details.php" class="btn btn-default">View Details</a>
						<a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart">Add to Cart</i></a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-sm-6 single">
			<div class="product">
				<a href="details.php">
					<img src="admin_area/product_images/product1.jpg" class="img-responsive">
				</a>
				<div class="text">
					<h3><a href="details.php">RUBICKS CUBE 2x2</a></h3>
					<p class="price">INR 299</p>
					<p class="buttons">
						<a href="details.php" class="btn btn-default">View Details</a>
						<a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart">Add to Cart</i></a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-sm-6 single">
			<div class="product">
				<a href="details.php">
					<img src="admin_area/product_images/product1.jpg" class="img-responsive">
				</a>
				<div class="text">
					<h3><a href="details.php">RUBICKS CUBE 2x2</a></h3>
					<p class="price">INR 299</p>
					<p class="buttons">
						<a href="details.php" class="btn btn-default">View Details</a>
						<a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart">Add to Cart</i></a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-sm-6 single">
			<div class="product">
				<a href="details.php">
					<img src="admin_area/product_images/product1.jpg" class="img-responsive">
				</a>
				<div class="text">
					<h3><a href="details.php">RUBICKS CUBE 2x2</a></h3>
					<p class="price">INR 299</p>
					<p class="buttons">
						<a href="details.php" class="btn btn-default">View Details</a>
						<a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart">Add to Cart</i></a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-sm-6 single">
			<div class="product">
				<a href="details.php">
					<img src="admin_area/product_images/product1.jpg" class="img-responsive">
				</a>
				<div class="text">
					<h3><a href="details.php">RUBICKS CUBE 2x2</a></h3>
					<p class="price">INR 299</p>
					<p class="buttons">
						<a href="details.php" class="btn btn-default">View Details</a>
						<a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart">Add to Cart</i></a>
					</p>
				</div>
			</div>
		</div>
-->
		<!------------------------>
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
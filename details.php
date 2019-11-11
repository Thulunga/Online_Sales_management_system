<?php  
	session_start();
	include('includes/db.php');
	include('functions/functions.php');
?>

<?php 
if (isset($_GET['pro_id'])) {
	$pro_id=$_GET['pro_id'];
	$getProduct = "select * from products where product_id = '$pro_id'";
	$run = mysqli_query($con,$getProduct);
	$row_product = mysqli_fetch_array($run);
	$pro_title = $row_product['product_title'];
	$p_cat_id = $row_product['p_cat_id'];
	$pro_price = $row_product['product_price'];
	$pro_img1 = $row_product['product_img1'];
	$pro_img2 = $row_product['product_img2'];
	$pro_img3 = $row_product['product_img3'];
	$pro_desc = $row_product['product_desc'];
	$pro_price = $row_product['product_price'];


	$get_p_cat = "select * from product_categories where p_cat_id = '$p_cat_id'";
	$run_p_cat = mysqli_query($con, $get_p_cat);
	$run_p_cat = mysqli_fetch_array($run_p_cat);
	$p_cat_title = $run_p_cat['p_cat_title'];
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
						<li class="active"><a href="shop.php">Shop</a></li>
						<li><a href="checkout.php">My Account</a></li>
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
				<?php 
				echo "
				<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>
				<li>$pro_title</li>
				";
				 ?>
			</ul>
		</div>
		<div class="col-md-3">
			<?php
			include("includes/sidebar.php");
		  	?>
		</div>
		<div class="col-md-9">
			<div class="row" id="productmain">
				<div class="col-sm-6">
					<div id="mainimage">
						<div id="mycarousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
								<li data-target="#mycarousel" data-slide-to="1"></li>
								<li data-target="#mycarousel" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="item active">
									<center>
										<?php  
										echo "
										<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
										";
										?>
									</center>
								</div>
								<div class="item">
									<center>
										<?php  
										echo "
										<img src='admin_area/product_images/$pro_img2' class='img-responsive'>
										";
										?>
									</center>
								</div>
								<div class="item">
									<center>
										<?php  
										echo "
										<img src='admin_area/product_images/$pro_img3' class='img-responsive'>
										";
										?>
									</center>
								</div>
							</div>
							<a href="#mycarousel" class="left carousel-control" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							</a>

							<a href="#mycarousel" class="right carousel-control" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							</a>


						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="box">
						<?php  
						echo "
						<h1 class='text-center'>$pro_title</h1>
						";
						?>
						<?php  
						addtoCart();
						?>
						<form action="details.php?add_cart=<?php echo"$pro_id";?>&pro_id=<?php echo"$pro_id";?>" method="post" class="form-horizontal">
							<div class="form-group">
								<label class="col-md-5 control-label">Product Quantity</label>
								<div class="col-md-7">
									<select name="product_qty" class="form-control">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Product Size</label>
								<div class="col-md-7">
									<select name="product_Size" class="form-control">
										<option>Select a size</option>
										<option>Small</option>
										<option>Medium</option>
										<option>Large</option>
										<option>Extra Large</option>
									</select>
								</div>
							</div>
							<?php  
							echo "
							<p class='price'>$pro_price</p>
							";
							?>
							<p class="text-center buttons">
								<button class="btn btn-primary" type="submit">
									<i class="fa fa-shopping-cart"></i>Add to cart
								</button>
							</p>
						</form>
					</div>
					<div class="col-xs-4">
						<a class="thumb" href="#">
							<?php  
								echo "
								<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
								";
							?>
						</a>
					</div>
					<div class="col-xs-4">
						<a class="thumb" href="#">
							<?php  
								echo "
								<img src='admin_area/product_images/$pro_img2' class='img-responsive'>
								";
							?>
						</a>
					</div>
					<div class="col-xs-4">
						<a class="thumb" href="#">
							<?php  
								echo "
								<img src='admin_area/product_images/$pro_img3' class='img-responsive'>
								";
							?>
						</a>
					</div>
				</div>
			</div>
			

			<div class="box" id="details">
				<h4>Product Details</h4>
				<?php  
				echo "<p>$pro_desc</p>";
				?>
				<h4>Size</h4>

				<ul>
					<li>Small</li>
					<li>Medium</li>
					<li>Large</li>
					<li>Extra Large</li>
				</ul>
			</div>

				 <div  class="bg-success">
				 <a class="col-md-6 box btn btn-success <?php if(isset($_GET['review'])){echo "active";} ?>" href="details.php?review=1&pro_id=<?php echo"$pro_id"; ?>"><span style="color:black;">Look Review</span></a>
				 </div>
				 <div>
				 <a class="col-md-6 box btn btn-info <?php if(isset($_GET['comment'])){echo "active";} ?>" href="details.php?comment=1&pro_id=<?php echo"$pro_id" ?>"><span style="color:black;">Look comments</span></a>
				 </div>


<!-------------------------------------->
				<?php
				if (isset($_GET['review'])) {
					include('includes/review.php');
				}
				else if (isset($_GET['comment'])){
					include('includes/comment.php');
				}
				?>
<!--------------------------------------------->

			<div id=" row same-height-row">
				<div class="col-md-3 col-sm-6">
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
</div>


	<?php 
	include("includes/footer.php");
	 ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
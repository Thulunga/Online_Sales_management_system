<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<h4>Pages</h4>
				<ul>
					<li><a href="cart.php">Shoping Cart</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="checkout.php">My Account</a></li>
				</ul><hr>
				<h4>User Section</h4>
				<ul>
					<li><a href="checkout.php">Login</a></li>
					<li><a href="customer_registration.php">Register</a></li>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Top Product Categories</h4>
				<ul>
					<?php  
					getProCat();
					/*$get_p_cat = "select * from product_categories";
					$run_p_cat = mysqli_query($con, $get_p_cat);
					while ($row_p_cat = mysqli_fetch_array($run_p_cat)) {
						$p_cat_id = $row_p_cat['p_cat_id'];
						$p_cat_title = $row_p_cat['p_cat_title'];
						echo "
						<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a>
						";
					}*/
					?>
					<!--<li><a href="#">Jacket</a></li>
					<li><a href="#">Accessories</a></li>
					<li><a href="#">Shoes</a></li>
					<li><a href="#">Coat</a></li>
					<li><a href="#">T-Shirts</a></li>-->
				</ul><hr class="hidden-md hidden-lg">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>where to find us</h4>
				<p><strong>Borobijwng.com</strong>
					<br>Thulunga Basumatary
					<br>Goreswar, Baksa (ASSAM)
					<br>Pin 781366
					<br>thulunga_b170399cs@nitc.ac.in
					<br>+91 8638113906
				</p>
				<a href="contact.php">Goto ontact us page</a>
				<hr class="hidden-md hidden-lg">
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Get The News</h4>
				<p class="text-muted">
					Subscribe here for getting news for arrival of new items
				</p>
				<form class="" action="" method="post">
					<div class="input-group">
						<input type="text" name="email" placeholder="email" class="form-control">
						<span class="input-group-btn"><input type="submit" class="btn btn-default" value="Subscribe"></span>
					</div>
				</form>
				<hr>
				<h4>Stay In Touch</h4>
				<p class="social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-envelope"></i></a>
					<a href="#"><i class="fa fa-google-plus"></i></a>
				</p>
			</div>
		</div>
	</div>
</div>
<div id="copyright">
	<div class="container">
		<div class="col-md-6">
			<p class="pull-left">
				&copy; 2019 Thulunga Basumatary
			</p>
		</div>
		<div class="col-md-6">
			<p class="pull-right">
				Template By: <a href="Borobijwng.club">Borobijwng.club</a>
			</p>
		</div>
	</div>	
</div>
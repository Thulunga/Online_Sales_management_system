<?php  
$db = mysqli_connect("localhost", "root", "", "ecom");

//collecting the user ip address start
function getUserIP(){
	switch (true) {
		case (!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
			break;
		case (!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
			break;
		case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
			break;
		default:
			return $_SERVER['REMOTE_ADDR'];
	}

 }
//collecting the user ip address end

//function for add to cart start

function addtoCart(){
	global $db;
	   if (isset($_GET['add_cart'])) {
		if (isset($_SESSION['userId'])) {
		   $userId = $_SESSION['userId'];
		  // $ip_add = getUserIP();
		   $p_id = $_GET['add_cart'];
		   $product_qty = $_POST['product_qty'];
		   //$product_size = $_POST['product_size'];
		   $check_product = "select * from cart where userId ='$userId' and p_id='$p_id'";
		   $run_check = mysqli_query($db, $check_product);
		   if (mysqli_num_rows($run_check)>0) {
			   echo "<script>alert('This product is allready added to cart')</script>";
			   echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		   }
		   else{
			   $query="insert into cart (p_id, userId, product_qty, product_size) values('$p_id','$userId','$product_qty','$product_size')";
			   $run_query= mysqli_query($db, $query);
			   echo "<script>alert('This product is successfully added to cart')</script>";
			   echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		   }
	   }
	   else{
		echo "
		<script>alert('You can add items to the cart after login');</script>
		<script>window.open('login.php','_self')</script>
		";
	   }
	}
}
 // function add to cart end;;;;
//function to count total cart product start;;;;;;;;
 function countcartPro(){//item
	 global $db;
	 $count=0;
	 //$ip_add = getUserIP();
	 if (isset($_SESSION['userId'])) {
		$userId = $_SESSION['userId'];
		$count = "select * from cart where userId = $userId";
		$run_count = mysqli_query($db, $count);
		$count = mysqli_num_rows($run_count);
	 }
 	echo "$count";
 }
 // end
//getting total price for the cart item
function totalPrice(){
	global $db;
	//$ip_add = getUserIP();
	$total =0;
	if (isset($_SESSION['userId'])) {
		$userId = $_SESSION['userId'];
		$get_cart_items = "select * from cart where userId = $userId";
		$run = mysqli_query($db,$get_cart_items);
		while ($row= mysqli_fetch_array($run)) {
			$pro_id=$row['p_id'];
			$pro_qty=$row['product_qty'];
			$product_price = "select * from products where product_id = '$pro_id'";
			$product_price = mysqli_query($db, $product_price);
			$product_price = mysqli_fetch_array($product_price);
			$product_price = $product_price['product_price'];
			$product_price= $product_price*$pro_qty;
			$total = $total + $product_price;
		}
	}
	echo "$total";

}
//////////////////////////////////////
/// total price for checking wether order can be placed or not

function totalPriceCount(){
	global $db;
	//$ip_add = getUserIP();
	$total =0;
	if (isset($_SESSION['userId'])) {
		$userId = $_SESSION['userId'];
		$get_cart_items = "select * from cart where userId = $userId";
		$run = mysqli_query($db,$get_cart_items);
		while ($row= mysqli_fetch_array($run)) {
			$pro_id=$row['p_id'];
			$pro_qty=$row['product_qty'];
			$product_price = "select * from products where product_id = '$pro_id'";
			$product_price = mysqli_query($db, $product_price);
			$product_price = mysqli_fetch_array($product_price);
			$product_price = $product_price['product_price'];
			$product_price= $product_price*$pro_qty;
			$total = $total + $product_price;
		}
	}
	return $total;

}


/////////////////////////////////////

 // end

//function for cart items view table start
function getcartView(){
	global $db;
	//$ip_add = getUserIP();
	$userId = $_SESSION['userId'];
	$cart = "select * from cart where userId = $userId";
	$cart = mysqli_query($db, $cart);
	while ($row_cart = mysqli_fetch_array($cart)) {
		$cart_id = $row_cart['cart_id'];
		$pro_id=$row_cart['p_id'];
		$pro_qty = $row_cart['product_qty'];
		$pro_size = $row_cart['product_size'];
////////////////////////////////////////
		$product = "select * from products where product_id = '$pro_id'";
		$product = mysqli_query($db, $product);
		$product = mysqli_fetch_array($product);
		$product_title = $product['product_title'];
		$product_price = $product['product_price'];
		$product_img1 = $product['product_img1'];

		$subTotal=$product_price * $pro_qty;
		echo "
		<tr>
			<td><img src='admin_area/product_images/$product_img1' class='img-responsive'></td>
			<td>$product_title</td>
			<td>$pro_qty</td>
			<td>INR $product_price</td>
			<td>$pro_size</td>
			<td><a href='cart.php?delete_item=$cart_id' class='btn btn-danger'>DELETE</a></td>
			<td>INR $subTotal</td>
		</tr>
		";
	}
}
// end
///////////deleting Item form cart(updating Cart  )

function deleteItem(){
	global $db;
	if (isset($_GET['delete_item'])) {
		$cart_id=$_GET['delete_item'];
		$delete_pro = "delete from cart where cart_id ='$cart_id'";
		$rundel = mysqli_query($db, $delete_pro);
		if ($rundel) {
			echo "
			<script>window.open('cart.php','_self')</script>
			";
		}
	}
	elseif(isset($_GET['delete_items'])){
		global $db;
		$userId = $_SESSION['userId'];
		$delete_pro = "delete from cart where userId = $userId";
		$rundel = mysqli_query($db, $delete_pro);
		if ($rundel) {
			echo "
			<script>alert ('Order placed successfully');</script>
			<script>window.open('cart.php','_self')</script>
			";
		}
	}
}

///////////// end update




function getPro(){
	global $db;
	$getProduct = "select * from products order by 1 DESC limit 0,6";
	$run = mysqli_query($db,$getProduct);
	while ($row_product = mysqli_fetch_array($run)) {
		$pro_id = $row_product['product_id'];
		$pro_title = $row_product['product_title'];
		$pro_price = $row_product['product_price'];
		$pro_img1 = $row_product['product_img1'];


		echo "
		<div class='col-sm-4 col-sm-6 single'>
			<div class='product'>
				<a href='details.php?pro_id=$pro_id'>
					<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
				</a>
				<div class='text'>
					<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
					<p class='price'>INR $pro_price</p>
					<p class='buttons'>
						<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
						<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'>Add to Cart</i></a>
					</p>
				</div>
			</div>
		</div>
		";
	}
}

function getProCat(){
	global $db;
	$get_p_cat = "select * from product_categories";
	$run_p_cat = mysqli_query($db, $get_p_cat);
	while ($row_p_cat = mysqli_fetch_array($run_p_cat)) {
		$p_cat_id = $row_p_cat['p_cat_id'];
		$p_cat_title = $row_p_cat['p_cat_title'];
		echo "
		<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a>
		";
	}
}



function getCat(){
	global $db;
	$get_cat = "select * from categories";
	$run = mysqli_query($db, $get_cat);
	while ($row_cat = mysqli_fetch_array($run)) {
		$cat_id = $row_cat['cat_id'];
		$cat_title = $row_cat['cat_title'];
		echo "

		<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>

		";
	}


}

/* get product categories product */
function getpcatPro(){
	global $db;
	if (isset($_GET['p_cat'])) {
		$p_cat_id = $_GET['p_cat'];
		$get_p_cat = "select * from product_categories where p_cat_id = '$p_cat_id'";
		$run = mysqli_query($db, $get_p_cat);
		$row = mysqli_fetch_array($run);
		$p_cat_title= $row['p_cat_title'];
		$p_cat_desc = $row['p_cat_desc'];

		$get_products = "select * from products where p_cat_id = '$p_cat_id'";
		$run_p = mysqli_query($db, $get_products);

		$count = mysqli_num_rows($run_p);
		if ($count == 0) {
			echo "
			<div class='box'>
				<h1>No Product Found In This Category</h1>
			</div></div>
			";
		}
		else{
			echo "
			<div class='box'>
				<h1>$p_cat_title</h1>
				<p>$p_cat_desc</p>
			</div>
		";
		
			while ($row_product = mysqli_fetch_array($run_p)) {
				$pro_id = $row_product['product_id'];
				$pro_title = $row_product['product_title'];
				$pro_price = $row_product['product_price'];
				$pro_img1 = $row_product['product_img1'];

				echo "
				<h1>Thulunga Basumatary</h1>
				<div class='col-sm-4 col-sm-6 center-responsive'>
					<div class='product'>
						<a href='details.php?pro_id=$pro_id'>
							<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
						</a>
						<div class='text'>
							<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class='price'>INR $pro_price</p>
							<p class='buttons'>
								<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
								<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'>Add to Cart</i></a>
							</p>
						</div>
					</div>
				</div></div>
				";
			}
		}
	}
	else if (isset($_GET['cat'])) {
		$cat_id = $_GET['cat'];
		$get_cat = "select * from categories where cat_id = '$cat_id'";
		$run = mysqli_query($db, $get_cat);
		$row = mysqli_fetch_array($run);
		$cat_title= $row['cat_title'];
		$cat_desc = $row['cat_desc'];

		$get_products = "select * from products where cat_id = '$cat_id'";
		$run_p = mysqli_query($db, $get_products);

		$count = mysqli_num_rows($run_p);
		if ($count == 0) {
			echo "
			<div class='box'>
				<h1>No Product Found In This Category</h1>
			</div></div>
			";
		}

		else{
			echo "
			<div class='box'>
				<h1>$cat_title</h1>
				<p>$cat_desc</p>
			</div>
			";
			while ($row_product = mysqli_fetch_array($run_p)) {
				$pro_id = $row_product['product_id'];
				$pro_title = $row_product['product_title'];
				$pro_price = $row_product['product_price'];
				$pro_img1 = $row_product['product_img1'];

				echo "
				<h1>ThulungaBasumatary</h1>
				<div class='col-sm-4 col-sm-6 center-responsive'>
					<div class='product'>
						<a href='details.php?pro_id=$pro_id'>
							<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
						</a>
						<div class='text'>
							<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class='price'>INR $pro_price</p>
							<p class='buttons'>
								<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
								<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'>Add to Cart</i></a>
							</p>
						</div>
					</div>
				</div></div>
				";
			}
		}
	}
}

function getProYouMayAlsoLike(){
	global $db;
	$getProduct = "select * from products order by 1 DESC limit 0,3";
	$run = mysqli_query($db,$getProduct);
	while ($row_product = mysqli_fetch_array($run)) {
		$pro_id = $row_product['product_id'];
		$pro_title = $row_product['product_title'];
		$pro_price = $row_product['product_price'];
		$pro_img1 = $row_product['product_img1'];


		echo "
		<div class='center-responsive col-md-3 col-sm-6'>
			<div class='product same-height'>
				<a href='details.php?pro_id=$pro_id'>
					<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
				</a>
				<div class='text'>
					<h3><a href='details.php'></a>$pro_title</h3>
					<p class='price'>$pro_price</p>
				</div>
			</div>
		</div>
		";
	}
}


function addComments(){
	global $db;
	
}









?>



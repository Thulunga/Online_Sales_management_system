<?php
	include('includes/db.php');
	include('functions/functions.php');
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css">

</head>

<!-- Coded With Love By Mutiullah Samim-->
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
		 			<li><a href="shop.php">Shop</a></li>
		 			<li><a href="contactus.php">Contact Us</a></li>
		 			<li><a href="login.php">Login</a></li>
		 		</ul>
		 	</div>
		 </div>

	</div><!-- top bar end-->




<!------------------------------->
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-4 animated bounceInDown myForm">
			<div class="card-header">
				<h4>Well come to Login</h4>
			</div>
            <form action="login.php" method="post" enctype="multipart/form-data">
			<div class="card-body">
					<div id="dynamic_container">
                        <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" placeholder="Email ID/User Name" name="mailuid" class="form-control"/>
						</div>
						<div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pwd" placeholder="Password" class="form-control"/>
						</div>
					</div>
			</div>
			<div class="card-footer">
            <button typr ="submit" name="login-submit" class="btn btn-success btn-sm float-right submit_btn"><i class="fas fa-arrow-alt-circle-right"></i>Login</button>
            <p>Dont have an account 
				<a href='customer_registration.php' class="btn btn-secondary btn-sm" id="add_more"><i class="fas fa-plus-circle"></i> create here</a></p>
			</div>
            </form>
		</div>
	</div>
</body>
</html>


<?php
if (isset($_POST['login-submit'])) {
    $mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if (empty($mailuid) || empty($password)){
		echo "
		<script>alert('You can't leave empty');</script>
		<!--<script>window.open('index.php?error=emptyfields','_self')</script>-->
		";
	}
	else{
		$sql = "select * from customers where customer_username= ? or customer_email=?";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "
		<script>alert('sql error');</script>
		<script>window.open('login.php','_self')</script>
		";
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdcheck = password_verify($password, $row['customer_pass']);
				if ($pwdcheck ==  false) {
					echo "
					<script>alert('password do not match');</script>
					<script>window.open('login.php','_self')</script>
					";
				}
				elseif ($pwdcheck == true) {
					session_start();
					$_SESSION['userId'] = $row['customer_id'];
                    $_SESSION['userName'] = $row['customer_username'];
                    $_SESSION['name'] = $row['customer_name'];
					$_SESSION['userEmail'] = $row['customer_email'];

					echo "
					<script>alert('Login successfull');</script>
					<script>window.open('index.php?login=success','_self')</script>
					";


				}
				else{
					echo "
					<script>alert('some error happend');</script>
					<script>window.open('login.php','_self')</script>
					";
				}
				
			}
			else{
				echo "
				<script>alert('User not found');</script>
				<script>window.open('login.php','_self')</script>
				";
			}
		}
	}
}



?>
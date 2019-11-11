<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<center>
			<img src="customar_images/customer1.jpg" class="img-responsive">
		</center>
		<br>
		<h3 align="center" class="panel-title">Name:<?php $name = $_SESSION['name']; echo "$name"; ?></h3>
	</div>
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php if(isset($_GET[my_order])){echo "active";}  ?>">
				<a href="my_account.php?my_order">
				<i class="fa fa-list"></i>
				My Orders</a>
			</li>

			<li class="<?php if(isset($_GET[pay_offline])){echo "active";}  ?>">
				<a href="my_account.php?pay_offline">
				<i class="fa fa-bolt"></i>
				Pay Offline</a>
			</li>

			<li class="<?php if(isset($_GET[edit_act])){echo "active";}  ?>">
				<a href="my_account.php?edit_act">
				<i class="fa fa-pencil"></i>
				Edit Account</a>
			</li>

			<li class="<?php if(isset($_GET[change_pass])){echo "active";}  ?>">
				<a href="my_account.php?change_pass">
				<i class="fa fa-user"></i>
				Change password</a>
			</li>

			<li class="<?php if(isset($_GET[delete_ac])){echo "active";}  ?> disabled">
				<a href="my_account.php?delete_ac">
				<i class="fa fa-trash"></i>
				Delete Account</a>
			</li>

			<li class="<?php if(isset($_GET[logout])){echo "active";}  ?>">
				<a href="../includes/logout.inc.php">
				<i class="fa fa-sign-out"></i>
				Log Out</a>
			</li>

		</ul>
	</div>
</div>
<div class="col-md-9">
<div class="box">
	<center>
		<h1>
			My Order Summary
		</h1>
		<p>If you have any question, please feel free to <a href="../contactus.php">contact</a> us, our customer service center is working for you 24/7.</p>
	</center>
	<hr>
	<div class="table-responsive">
    <a class='btn btn-success' href=''>Only cash on delevery available right now</a>
    <a class='btn btn-warning disabled' href=''>Online Payment</a>
    <a class='btn btn-warning disabled' href=''>Cart Payment</a>
    <a class='btn btn-warning disabled' href=''>Pay using UPI ID</a>
		
        <div class="col-md-12">
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
    <a class='btn btn-info' href='cart.php'>Edit cart Items</a>
    <a class='btn btn-danger pull-right' href='cart.php?delete_items=1&confirm=1'>confirm my order</a>
	</div>
</div>
</div>
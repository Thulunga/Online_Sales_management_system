<div class="col-md-9" id="cart">
    <div class="box">
        <form method="post" action="cart.php" enctype="multipart-form-data">
            <h1>Shopping Cart</h1>
            <p class="text-muted">Curently You have <?php countcartPro(); ?> item(s) in your cart</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Size</th>
                            <th colspan="1">Delete</th>
                            <th colspan="1">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        getcartView();
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">Total</th>
                            <th colspan="2">INR <?php totalPrice(); ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="box-footer">
                <div class="pull-left">
                    <a href="shop.php" class="btn btn-default">
                        <i class="fa fa-chevron-left"> Continue Shopping</i>
                    </a>
                </div>
                <div class="pull-right">
                    <!--<button class="btn btn-default" type="submit" name="update" value="Update Cart">
                        <i class="fa fa-refresh"> Update Cart</i>
                    </button>-->
                    <?php
                    $price =totalPriceCount();
                    if($price == 0){
                        echo "
                        <a href='cart.php?checkout=1' class='btn btn-primary disabled'> Proceed to Checkout
                        <i class='fa fa-chevron-right'></i></a>
                        ";
                    }
                    else{
                        echo "
                        <a href='cart.php?checkout=1' class='btn btn-primary'> Proceed to Checkout
                        <i class='fa fa-chevron-right'></i></a>
                        ";
                    }
                    ?>
                    
                </div>
            </div>
        </form>
    </div>
    <?php 
    
    echo @deleteItem();
    ?>
</div>
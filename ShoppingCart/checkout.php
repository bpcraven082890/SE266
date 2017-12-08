<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 12/8/2017
 * Time: 1:23 PM
 */
session_start();
//include_once( "classes/Order.php");
include_once("assets/header.php");
?>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Shopping Cart</h1>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="list-group">

            <?php
            $length = count($_SESSION['order_products']);
            for( $i=0;$i<$length;$i++){
                $product = $_SESSION['order_products'][$i];
                ?>

                <div class="list-group-item list-group-item-action flex-column align-items-start active">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $product['name']?></h5>
                        <small>Quantity: 1</small>
                    </div>
                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                    <small><?php echo $product['price']?></small>
                </div>
                <?php }
                $subtotal = 0;

            for( $i=0;$i<$length;$i++){
                $product = $_SESSION['order_products'][$i];
                $subtotal += $product['price'];
            }
            $tax_rate = 0.07;
            $tax = $subtotal * $tax_rate;
            $total = $tax + $subtotal;
            $today = date('Y/m/d');
            ?>

            <div class="list-group-item flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Shopping Cart Total</h5>
                    <small class="text-muted">Quantity: <?php echo $length ?></small>
                </div>
                <p class="mb-1">Subtotal: $<?php echo round($subtotal,2) ?></p>
                <small class="text-muted">Tax Rate: <?php echo $tax_rate ?></small>
                <p class="mb-1">Taxes Paid: $<?php echo round($tax,2) ?></p>
                <p class="mb-1"><strong>Total: $<?php echo round($total,2) ?></strong></p>
                <small class="text-muted">Date of purchase: <?php echo $today ?></small>
                <p><a class="btn btn-primary" href="confirm.php">Confirm Purchase &raquo;</a>
                    <a href="endsession.php" class="btn btn-secondary" >Clear Cart</a></p>
            </div>
        </div>
    </div>
</div>

<?php include_once("assets/footer.php"); ?>

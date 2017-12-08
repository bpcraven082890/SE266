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
<!--        <h1 class="display-3">Congratulations!</h1>-->
        <div class="card border-success mb-3" style="max-width: 20rem;">
            <div class="card-header">Congratulations!</div>
            <div class="card-body text-success">
                <h4 class="card-title">Your purchase has been successfully placed!</h4>
                <p class="card-text">Confirmation number: <?php echo mt_rand(4000, 1000000) ?></div>
        </div>
    </div>
</div>


<?php include_once("assets/footer.php"); ?>

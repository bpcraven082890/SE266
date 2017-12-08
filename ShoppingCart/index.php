<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 12/4/2017
 * Time: 11:59 AM
 */

session_start();
//include_once( "classes/Order.php");
//$_SESSION['order'] = new Order(mt_rand(0,50),0);
if(!isset($_SESSION['order_products'])) {
    $_SESSION['order_products'] = array();
}
$names = array('Doodad','Gizmo','Thingamjig','Whoosy','Whatsit','Dinglehopper','Widget','Foo','Bar','Fizzbuzz');
$prices = array(3.99,7.99,12.99,10.99,20.99,2.99,1.49,99.99,0.99,35.99);
include_once("assets/header.php");

if(isset($_POST['prod_id'])){

    $product = array(
            name=>$_POST['name'],
            prod_id=>$_POST['prod_id'],
            price=>$_POST['price']);
    array_push($_SESSION['order_products'], $product);
    header('Location: checkout.php');
}

?>




<main role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Shopper</h1>
            <p>Welcome to Shopper! To start shopping find something and click "Buy It!"</p>

            <p>
                <a id="shopping"></a>

                <a class="btn btn-primary btn-lg" href="#shopping" role="button">Start Shopping &raquo;</a></p>
        </div>
    </div>


    <div class="container">
        <!-- Example row of columns -->
        <?php
        $prod_id = 0;
        for($i=0;$i<5;$i++){ ?>
            <div class="row">

            <?php for($j=0;$j<2;$j++){ ?>

            <div class="col-md-6">
                <form method="post" action="#">
                <h2><?php echo $names[$prod_id] ?></h2>
                <img src="http://lorempixel.com/300/200/technics/<?php echo $prod_id ?>" />
                <p>Donec id elit non mi porta gravida at eget metus. </p>
                <p><?php echo $prices[$prod_id] ?><input type="hidden" name="price" value="<?php echo $prices[$prod_id]?>" /></p>
                <input type="hidden" name="name" value="<?php echo $names[$prod_id]?>" />
                <input type="hidden" name="prod_id" value="<?php echo $prod_id?>" />

                <p><input class="btn btn-secondary" type="submit" value="Buy It! &raquo;"></input></p>
                </form>
            </div>
            <?php
                $prod_id++;
            }
            ?>

            </div>
    <?php }?>



    </div> <!-- /container -->

</main>

<?php include_once("assets/footer.php"); ?>

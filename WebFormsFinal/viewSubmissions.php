<?php

include_once("assets/header.php");
require_once("assets/functions.php");
require_once("assets/dbConn.php");
$db = dbConn(); ?>
<main role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Members</h1>
            <p>Here is our Mailing List</p>
        </div>
    </div>


    <div class="container">
        <!-- Example row of columns -->
            <div class="row">

                    <div class="col-md-6">
                        <?php echo getMembersAsTable($db); ?>
                    </div>

            </div>



    </div> <!-- /container -->

</main>
<?php
include_once("assets/footer.php");?>
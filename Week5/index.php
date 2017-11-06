<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/23/2017
 * Time: 11:58 AM
 */
require_once("corpsConn/dbConn.php");
require_once ("corpsConn/corpsFunctions.php");
include_once ("corpsConn/header.php");?>

<a href="corpsConn/viewCorps.php">View</a>
<a href="corpsConn/corpsForm.php">Add</a>
<?php

$db = dbConn();
$action = filter_input(INPUT_POST, 'action', FILTER_CALLBACK);
$incorp_dt = filter_input(INPUT_POST, 'incorp_dt', FILTER_SANITIZE_STRING) ?? "";
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";


include_once("corpsConn/footer.php");
?>



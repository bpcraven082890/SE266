<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/23/2017
 * Time: 11:58 AM
 */
require_once("corpsConn/dbConn.php");
require_once ("corpsConn/corpsFunctions.php");
include_once ("corpsConn/header.php");
$db = dbConn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET,'action', FILTER_SANITIZE_STRING) ?? "";
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipCode = filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
switch ( $action ) {
    case "Add":
        addCorps( $db, $corp, $email, $zipCode, $owner, $phone );
        break;
}
echo getCorpsAsTable($db);

include_once("corpsConn/footer.php");
?>
<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/23/2017
 * Time: 11:58 AM
 */
require_once("assests/dbConn.php");
require_once ("assests/corpsFunctions.php");
include_once ("assests/header.php");
$db = dbconn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET,'action', FILTER_SANITITIZE_STRING) ?? "";
$corps = filter_input(INPUT_POST, 'corps', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING) ?? "";
$zipCode = filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
switch ( $action ) {
    case "Add":
        addCorps( $db, $corps, $email, $zipCode, $owner, $phone );
        break;
}
echo getCorpsAsTable($db);
include_once ("assests/corpsForm.php");
include_once ("assests/footer.php");
?>
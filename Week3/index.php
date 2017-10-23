<?php
require_once("DBSubmissions/dbConn.php");
require_once ("DBSubmissions/actorsFunctions.php");
include_once ("DBSubmissions/header.php");
$db = dbconn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING) ?? "";
$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING) ?? "";
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING) ?? "";
$height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_STRING) ?? "";
switch ( $action ) {
    case "Add":
        addActor( $db, $firstName, $lastName, $dob, $height );
        break;
}
echo getActorsAsTable($db);
include_once ("DBSubmissions/actorsForm.php");
include_once ("DBSubmissions/footer.php");
?>
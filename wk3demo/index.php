<?php
require_once("assests/dbconn.php");
include_once("assests/header.php");
require_once("assests/dogs.php");
include_once("assests/dogform.php");
$db = dbconn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING) ?? "";
$gender = filter_input(INPUT_POST, 'gender', FILTER_VALIDATE_REGEXP,
        array
        (
            "options"=>array("regexp"=>'/^[MF]$/')
        )
        ) ?? "";
$fixed = filter_input(INPUT_POST, 'fixed', FILTER_VALIDATE_BOOLEAN) ?? false;

switch($action)
{
    case "Add":

        addDog($db, $name, $gender, $fixed);
        break;
}


echo(getDogsAsTable($db));

include_once("assests/footer.php");
?>
<?php
require_once("assests/dbconn.php");
include_once("assests/header.php");

$db = dbconn();
require_once("assests/dogs.php");
var_dump(getDogsAsTable($db));

include_once("assests/footer.php");
?>
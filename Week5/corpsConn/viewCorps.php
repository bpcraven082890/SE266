<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/23/2017
 * Time: 12:23 PM
 */
include_once("header.php");
require_once("corpsFunctions.php");
require_once("dbConn.php");
$db = dbConn();

$id = filter_input(INPUT_GET, "id");

echo getCorpsAsTable($db);


include_once("footer.php");
?>
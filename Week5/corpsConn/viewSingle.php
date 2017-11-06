<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 11/6/2017
 * Time: 11:52 AM
 */
include_once("header.php");
require_once("corpsFunctions.php");
require_once("dbConn.php");
$db = dbConn();

$id = filter_input(INPUT_GET, "id");
echo getARecord($db, $id);

include_once("footer.php");
?>
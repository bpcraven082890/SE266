<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/23/2017
 * Time: 12:23 PM
 */
require_once ("header.php");
require_once ("corpsFunctions.php");
getCorpsAsTable($db);

$id = $corp['id'];
$db = ("SELECT * FROM corps WHERE id=$corp[id]");
echo getARecord($db, $id);
require_once ("footer.php");
?>
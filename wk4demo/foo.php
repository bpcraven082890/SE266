<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 11/6/2017
 * Time: 12:42 PM
 */
session_start();// every page that needs session variable needs this line of code to start
if($_SESSION['username'] == NULL || !isset($_SESSION['username']))
{
    header('Location: foo2.php');
}

$file =file_get_contents("https://www.cnn.com");
echo preg_match_all('/Trump/', $file, $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
/*
 * grabbing a primary key for a foreign key reference
 * $db = dbConn();
 * $sql = "INSERT INTO sites VALUES(null, 'Ben', 'Craven');
 * $stmt = $db ->prepare($sql);
 * bind params as necessary
 * $stmt -> execute();
 *
 * $pk = $db->lastInsertId(); //gets the last primary key inserted into database
 * if you get back a zero something went wrong with insert statement.
 *
 */
$pwd = "foo";
$hash = password_hash($pwd, PASSWORD_DEFAULT);
echo "<p>" . $hash . "</p>";

// Pretend $hash came from $db
echo password_verify("foo", $hash);

/*$pwd = "foo";
echo "<p>" . password_hash($pwd, PASSWORD_DEFAULT). "</p>";
$pwd = "foolishness";
echo "<p>" . password_hash($pwd, PASSWORD_DEFAULT). "</p>";*/

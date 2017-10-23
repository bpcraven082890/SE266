<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/16/2017
 * Time: 12:07 PM
 */
function dbConn()
{
    $dsn = "mysql:host=localhost;dbName=PHPClassFall2017";
    $username = "actors";
    $password = "se266";
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("There was an issue connecting to the database. Please try again or speak to your database manager.");
    }
}

?>
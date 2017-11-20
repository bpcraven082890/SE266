<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 11/6/2017
 * Time: 2:06 PM
 */
//password verification
session_start();
$_SESSION['username'] = "Ben";
header('Location: foo.php');
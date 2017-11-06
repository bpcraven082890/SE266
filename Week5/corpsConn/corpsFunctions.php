<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/23/2017
 * Time: 12:09 PM
 */
require_once("dbConn.php");
function addCorps($db, $corp, $incorp_dt, $email, $zipcode, $owner, $phone)
{
    try {
        $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, :incorp_dt, :email, :zipcode, :owner, :phone)");
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':incorp_dt', $incorp_dt);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        return $sql->rowCount();
    } catch (PDOException $e) {
        die("There was a problem adding the corporation.");
    }
}

function getCorpsAsTable($db) {
    try {
        $sql = $db->prepare("SELECT * FROM corps");
        $sql->execute();
        $string = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ( $sql->rowCount() > 0 ) {
            $table = "<table>" . PHP_EOL;
            foreach ( $string as $corp ) {
                $table .= "<tr><td>" . $corp['corp'];
                $table .= "</td><td><a href=\"viewSingle.php?id=" . $corp['id'] . "\">  Read </a>";
                $table .= "</td><td><a href=\"update.php?id=" . $corp['id'] . "\"> Update </a>";
                $table .= "</td><td><a href=\"delete.php?id=" . $corp['id'] . "\"> Delete </a>";
                $table .= "<td style='display:none'>" . $corp['id'];
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "There are no corporations.";
        }
        return $table;
    } catch (PDOException $e){
        die("There was a problem retrieving the corporations.");
    }
}

function getARecord($db, $id)
{
    try
    {
        $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $string = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ( $sql->rowCount() > 0 ) {
            $table = "<table>" . PHP_EOL;
            foreach ( $string as $corp ) {
                $table .= "<tr><td>Corporation:  " . $corp['corp'];
                $table .= "<tr><td>Incorporated:  " . $corp['incorp_dt'];
                $table .= "<tr><td>Email:  " . $corp['email'];
                $table .= "<tr><td>Zip Code:  " . $corp['zipcode'];
                $table .= "<tr><td>Owner:  " . $corp['owner'];
                $table .= "<tr><td>Phone:  " . $corp['phone'];
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "There are no corporations.";
        }
        return $table;
    } catch (PDOException $e) {
        die("There was a problem retrieving the corporations.");
    }
}

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}
?>
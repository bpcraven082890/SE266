<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 12/11/2017
 * Time: 12:09 PM
 */
require_once ("dbConn.php");
$results = "";
function addMember($db, $email, $phone, $heard, $contact, $comments)
{
    try {
        $sql = $db->prepare("INSERT INTO account VALUES (null, :email, :phone, :heard, :contact, :comments)");
        $sql->bindParam(':email', $email);
        $sql->bindParam(':phone', $phone);
        $sql->bindParam(':heard', $heard);
        $sql->bindParam(':contact', $contact);
        $sql->bindParam(':comments', $comments);
        $binds = array(
            ":email" => $email,
            ":phone" => $phone,
            ":heard" => $heard,
            ":contact" => $contact,
            ":comments" => $comments
        );

        if ($sql->execute($binds) && $sql->rowCount() > 0) {
            $results = "Record Added.";
        }
        return $results;
    } catch (PDOException $e) {
        die("There was a problem adding the member.");
    }
}

function getMembersAsTable($db) {
    try {
        $sql = $db->prepare("SELECT * FROM account");
        $sql->execute();
        $members = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ( $sql->rowCount() > 0 ) {
            $table = "<table>" . PHP_EOL;
            foreach ( $members as $member ) {
                $table .= "<tr><td>" . $member['email'];
                $table .= "</td><td>" . $member['phone'];
                $table .= "</td><td>" . $member['heard'];
                $table .= "</td><td>" . $member['contact'];
                $table .= "</td><td>" . $member['comments'];
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
            $table .= "<br />";
            $table .= "<br />";
        } else {
            $table = "Life is sad. There are no members.";
            $table .= "<br />";
            $table .= "<br />";
        }
        return $table;
    } catch (PDOException $e){
        die("There was a problem retrieving the members");
    }
}
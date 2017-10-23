<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/23/2017
 * Time: 12:09 PM
 */
function addCorps($db, $corps, $email, $zipCode, $owner, $phone) {
    try {
        $sql = $db->prepare("INSERT INTO corps VALUES (null, :corps, :email, :zipCode, :owner, :phone)");
        $sql->bindParam(':corps', $corps);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zipCode', $zipCode);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        return $sql->rowCount();
    } catch (PDOException $e) {
        die("There was a problem adding an actor.");
    }
}

function getCorpsAsTable($db) {
    try {
        $sql = $db->prepare("SELECT * FROM corps");
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ( $sql->rowCount() > 0 ) {
            $table = "<table>" . PHP_EOL;
            foreach ( $corps as $corp ) {
                $table .= "<tr><td>" . $corp['corps'];
                $table .= "</td><td>" . $corp['email'];
                $table .= "</td><td>" . $corp['zipCode'];
                $table .= "</td><td>" . $corp['owner'];
                $table .= "</td><td>" . $corp['phone'];
                $table .= "</td><td> <a href=''"
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
            $table .= "<br />";
            $table .= "<br />";
        } else {
            $table = "Life is sad. There are no actors.";
            $table .= "<br />";
            $table .= "<br />";
        }
        return $table;
    } catch (PDOException $e){
        die("There was a problem retrieving the actors");
    }
}
?>
<?php
function getActorsAsTable($db) {
    try {
        $sql = $db->prepare("SELECT * FROM actors");
        $sql->execute();
        $actors = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ( $sql->rowCount() > 0 ) {
            $table = "<table>" . PHP_EOL;
            foreach ( $actors as $actor ) {
                $table .= "<tr><td>" . $actor['firstName'];
                $table .= "</td><td>" . $actor['lastName'];
                $table .= "</td><td>" . strtotime($actor['dob']);
                $table .= "</td><td>" . $actor['height'];
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
function addActor($db, $firstName, $lastName, $dob, $height) {
    try {
        $sql = $db->prepare("INSERT INTO actors VALUES (null, :firstName, :lastName, :dob, :height)");
        $sql->bindParam(':firstName', $firstName);
        $sql->bindParam(':lastName', $lastName);
        $sql->bindParam(':dob', $dob);
        $sql->bindParam(':height', $height);
        $sql->execute();
        return $sql->rowCount();
    } catch (PDOException $e) {
        die("There was a problem adding an actor.");
    }
}
?>
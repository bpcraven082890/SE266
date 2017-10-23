<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/23/2017
 * Time: 12:09 PM
 */
function addCorps($db, $corp, $email, $zipCode, $owner, $phone)
{
    try {
        $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, 'NOW()', :email, :zipCode, :owner, :phone)");
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zipCode', $zipCode);
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
                $table .= "</td><td><a href='corpsConn/viewCorps.php?action=read & id=<?php echo $corp[id] ?>'> Read </a>";
                $table .= "</td><td><a href='corpsConn/corpsForm.php?action=update & id=<?php echo $corp[id] ?>'>Update </a>";
                $table .= "</td><td><a href='#'>Delete</a>";
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
        $string = $sql->fetchAll(PCO::FETCH_ASSOC);
        if ( $sql->rowCount() > 0 ) {
            $table = "<table>" . PHP_EOL;
            foreach ( $string as $corp ) {
                $table .= "<tr><td>" . $corp['corp'];
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

?>
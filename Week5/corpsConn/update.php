<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/25/2017
 * Time: 1:29 PM
 */
include_once("header.php");
require_once("dbConn.php");
require_once("corpsFunctions.php");

$db = dbConn();

$result = "";
if (isPostRequest()) {
    $id = filter_input(INPUT_GET, 'id');
    $corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
    $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
    $owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";

    $sql = $db->prepare("UPDATE corps set corp = :corp, email=:email, zipcode=:zipcode, owner=:owner, phone=:phone where id = :id");

    $binds = array(
        ":id" => $id,
        ":corp" => $corp,
        ":email" => $email,
        ":zipcode" => $zipcode,
        ":owner" => $owner,
        ":phone" => $phone
    );

    if ($sql->execute($binds) && $sql->rowCount() > 0) {
        $result = 'Record updated';
    }
} else {
    $id = filter_input(INPUT_GET, 'id');
    $sql = $db->prepare("SELECT * FROM corps where id = :id");
    $binds = array(
        ":id" => $id
    );
    if ($sql->execute($binds) && $sql->rowCount() > 0) {
        $results = $sql->fetch(PDO::FETCH_ASSOC);
    }
    if (!isset($id)) {
        die('Record not found');
    }
    $corp = $results["corp"];
    $email = $results["email"];
    $zipcode = $results["zipcode"];
    $owner = $results["owner"];
    $phone = $results["phone"];
}

?>

<h1><?php echo $result; ?></h1>

<form action='#' method='post'>
    <label for='corp'><b>Corporation: </b></label>
    <input type='text' name='corp' id='corp' value=''/><br/>

    <label for='email'><b>Email: </b></label>
    <input type='text' name='email' id='email' value=''/><br/>

    <label for='zipcode'><b>Zip Code: </b></label>
    <input type='text' name='zipcode' id='zipcode' value=''/><br/>

    <label for='owner'><b>Owner: </b></label>
    <input type='text' name='owner' id='owner' value=''/><br/>

    <label for='phone'><b>Phone Number: </b></label>
    <input type='text' name='phone' id='phone' value=''/><br/>

    <input type='submit' name='action' value='Update'/>
</form>
<?php
include_once "footer.php";
?>
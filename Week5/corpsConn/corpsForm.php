<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/23/2017
 * Time: 11:59 AM
 */
include_once "header.php";
require_once "dbConn.php";
require_once "corpsFunctions.php";
$results = "";
if (isPostRequest()) {
    $db = dbConn();

    $sql = $db->prepare("INSERT INTO corps SET corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
    $corp = filter_input(INPUT_POST, "corp", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $zipcode = filter_input(INPUT_POST, "zipcode", FILTER_SANITIZE_STRING);
    $owner = filter_input(INPUT_POST, "owner", FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
    $binds = array(
        ":corp" => $corp,
        ":email" => $email,
        ":zipcode" => $zipcode,
        ":owner" => $owner,
        ":phone" => $phone
    );

    if ($sql->execute($binds) && $sql->rowCount() > 0) {
        $results = "Record Added.";
    } else {
        $results = "I'm sorry, there was a problem adding the record.";
    }
}
?>


<h1><?php echo $results; ?></h1>

<h1>Add a New Corporation</h1>

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

    <input type='submit' name='action' value='Add'/>
</form>
<?php
include_once "footer.php";
?>
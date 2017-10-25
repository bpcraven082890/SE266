<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/25/2017
 * Time: 1:29 PM
 */
include_once ("header.php");
require_once ("dbConn.php");
require_once ("corpsFunctions.php");

$db = dbConn();

if( isPostRequest() ) {
    $id = filter_input(INPUT_POST, 'id');
    $corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
    $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
    $owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";

    $sql = $db->prepare("UPDATE corps SET corp = :corp, email=:email, zipcode=:zipcode, owner=:owner, phone, :phone WHERE id = :id");

    $binds = array(
        ":id" => $id,
        ":corp" => $corp,
        ":email" => $email,
        ":zipcode" => $zipcode,
        ":owner" => $owner,
        ":phone" => $phone
    );

    $message = "Update failed.";

    if ($sql->execute($binds) && $sql->rowCount() > 0) {
        $message = "Update Complete";
    }

}else
{
    $id = filter_input(INPUT_GET, "id");

}

$sql = $db->prepare("SELECT * FROM corps WHERE id =:id");

$binds = array(
    ":id" => $id
);

$result = array();
if($sql->execute($binds) && $sql->rowCount() > 0)
{
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    $corp = $result["corp"];
    $email = $result["email"];
    $zipcode = $result["zipcode"];
    $owner = $result["owner"];
    $phone = $result["phone"];
}
else
{
    header("Location: viewCorps.php");
    die("ID not found.");
}

?>

<p>
    <?php if ( isset($message) ) { echo $message; } ?>
</p>

<?php
require_once ("corpsForm.php");
?>

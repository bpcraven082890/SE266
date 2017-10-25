<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/25/2017
 * Time: 2:06 PM
 */
require_once ("dbConn.php");

$id = filter_input(INPUT_GET, "id");

$db = dbConn();

$sql = $db->prepare("DELETE FROM corps WHERE id = :id");

$binds = array(
    ":id" => $id
);

$isDeleted = false;

if($sql->execute($binds) && $sql->rowCount() > 0)
{
    $isDeleted = true;
}
?>
<h1> Record <?php echo $id; ?>
    <?php if (!$isDeleted): ?>Not<?php endif; ?>
    Deleted
</h1>

<a href="<?php echo filter_input(INPUT_SERVER, "HTTP_REFERER"); ?>"> Go Back </a>

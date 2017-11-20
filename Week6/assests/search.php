<?php
include_once("header.php");
require_once ("dbConn.php");
require_once ("function.php"); ?>
<form action="#" method="post">
    <?php dropDownList(dbConn());?>
    <input type="submit" name="action" value="Submit">
</form>
<?php
    if(isset($_POST['action']))
    {
        justSites(dbConn(), $_POST['option']);
    }
include_once("footer.php");
?>

<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 11/8/2017
 * Time: 1:16 PM
 */
include_once("assests/header.php");
require_once("assests/dbConn.php");
require_once("assests/function.php"); ?>

    <p>Please enter a valid URL</p>
    <form action="#" method="post">
        <input type="text" name="site" id="site" value=""/>
        <input type="submit" name="action" value="Submit"/>
    </form>
<?php

dbConn();

if (isset($_POST['action'])) {
    if (empty($_POST['site'])) {
        echo "Sorry there is no site for you to look at";
    } else {
        if (!preg_match("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $_POST['site'])) {
            echo "Please enter website in the proper format. http://www.facebook.com";
        } else {
            $links = findLink(dbConn(), $_POST['site']);
            if ($links == 0) {
                $sites = array();
                $contents = file_get_contents($_POST['site']);
                echo "<b>" . preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $contents, $matches, PREG_OFFSET_CAPTURE) . " link(s) found for</b>\"<a href=''" . $_POST['site'] . "</a>\"<br/><hr>";
                preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $contents, $matches, PREG_OFFSET_CAPTURE);

                foreach ($matches as $match) {
                    foreach ($match as $m) {
                        array_push($sites, $m[0]);
                        echo "<a href='" . $m[0] . "'>" . $m[0] . "</a><br/>";
                    }
                }
                addSite(dbConn(), $_POST['site'], $links);
            } else {
                echo $_POST['site'] . " already exists in our database. <br/>";
                echo $links;


            }

        }


    }


}


include_once("assests/footer.php");
?>
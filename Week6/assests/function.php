<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 11/13/2017
 * Time: 12:17 PM
 */
require_once("dbConn.php");
function addSite($db, $site, $sites)
{
    try {
        $sql = $db->prepare("INSERT INTO sites VALUES (null, :site, NOW())");
        $sql->bindParam(':site', $site);
        $sql->execute();
        $siteID = $db->lastInsertID();
        foreach($sites as $link)
        {
            $sql = $db->prepare("INSERT INTO sitelinks VALUES :siteID, :link");
            $sql->bindParam(':link', $link);
            $sql->bindParam(':site_id', $siteID);
            $sql->execute();
        }
        return $sql->rowCount();
    } catch (PDOException $e) {
        echo $e;
        die("There was a problem adding the site.");
    }
}

function findLink($db, $site)
{
    try{
        $sql = $db->prepare("SELECT Count(*) FROM sites WHERE site=:site");
        $sql->bindParam('site', $site);
        $sql->execute();
        $num = $sql->fetchColumn();
        return $num;
    }
    catch(PDOException $e)
    {
        echo $e;
        die("There was a problem finding the links.");
    }
}

function dropDownList($db)
{
    try
    {
        $sql = $db->prepare("SELECT * FROM sites");
        $sql->execute();
        $sites = $sql->fetchALL(PDO::FETCH_ASSOC);
        if($sql->rowCount() > 0)
        {
            $droplist = "<select name='option'>" . PHP_EOL;
            foreach($sites as $site)
            {
                $droplist .= "<option>". $site['site'] . "</option>";
            }
            $droplist .= "</select>";
        }
        else
        {
            $droplist = "There are no sites.";
        }
        echo $droplist;
    }
    catch(PDOException $e)
    {
        die("There was a problem with retrieving your sites.");
    }
}

function justSites($db, $option)
{
    try{
        $sql = $db->prepare("SELECT site_id, date FROM sites WEHRE site=:option");
        $sql->bindParam(":option", $option);
        $sql->execute();

        $sites = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($sites as $site)
        {
            echo $sql->rowCount()." link(s) found for " . $option . ", stored on ". $site['date'];
            $siteID = $site['site_id'];
        }
        $sql = $db->prepare("SELECT * FROM sitelinks WHERE site_id = :site_id");
        $sql->bindParam(":site_id", $siteID);
        $sql->execute();
        $links = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($links as $link)
        {
            echo "a href='". $link['link']. "'>" . $link['link'] .  "</a><br/>";
        }
    }

    catch(PDOException $e)
    {
        die("There was a problem with retrieval.");
    }
}
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}
?>


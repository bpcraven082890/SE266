<?php
/**
 * Created by PhpStorm.
 * User: 005503734
 * Date: 10/11/2017
 * Time: 1:21 PM
 */
$dsn = "mysql:host=localhost;dbname=dogs";
$username = "dogs";
$password = "se266";
try
{
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    die("There was an issue connecting to the database. Please try again or speak to your database manager.");
}

/*if( isset( $_POST['submit']) )
{
    $submit = $_POST['submit'];
}
else
{
    $submit = "";
}*/

//$submit = isset($_POST['submit']) ? $_POST['submit'] : "";

$submit = $_POST['submit'] ?? "";

if($submit == "Submit")
{
    $name = $_POST['name'] ?? "";
    $gender = $_POST['gender'] ?? "F";
    $fixed = $_POST['fixed'] ?? false;
    try {
        $sql = $db->prepare("INSERT INTO animals VALUES (null, :name, :gender, :fixed)");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':gender', $gender);
        $sql->bindParam(':fixed', $fixed);
        $sql->execute();
        echo $sql->rowCount() . " rows inserted.";
    } catch(PDOException $e)
    {
        die("There was an issue connecting to the database. Please try again or speak to your database manager.");
    }
}



?>
<form method="post" action="#">
    Name: <input type="text" name="name" /> <br />
    Gender: M<input type="radio" name="gender" value="M" />
    F<input type="radio" name="gender" value="F" /> <br />
    Fixed: <input type="checkbox" name="fixed" value="true" /> <br />
    <input type="submit" name="submit" value="Submit"/>

</form>

<?php
$sql = $db->prepare("SELECT * FROM animals");
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
if(count($results))
{
    foreach($results as $dog)
    {
        print_r($dog);
    }
}


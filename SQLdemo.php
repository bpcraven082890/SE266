<?php
echo var_dump($_POST);
if(isset($_POST['action'])){
    $action = $_POST['action'];
    if($action=='add'){
        echo "adding data!<br/>";
    }else{
        echo "not adding data!<br/>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SQL Demo</title>
</head>
<body>
<form method="post" action="SQLdemo.php">
    <input type="hidden" name="action" value="add"/>
    <button type="submit">submit</button>
</form>
</body>
</html>
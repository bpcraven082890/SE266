<?php
    $colors = array();
    for($i = 0; $i < 100; $i++)
    {
        $color = "#";
        for($j = 0; $j < 6; $j++)
        {
            $randNum = rand(0, 15);
            switch ($randNum)
            {
                case 10:
                    $randNum = 'A';
                    break;
                case 11:
                    $randNum = 'B';
                    break;
                case 12:
                    $randNum = 'C';
                    break;
                case 13:
                    $randNum = 'D';
                    break;
                case 14:
                    $randNum = 'E';
                    break;
                case 15:
                    $randNum = 'F';
                    break;
            }
            $color .= $randNum;
        }
        array_push($colors, $color);
    }
sort($colors);
$count = 0;
$table = "<table>";
for ($rows = 0; $rows < 10; $rows++)
{
    $table .= "\t<tr>";
    for ($cols = 0; $cols < 10; $cols++)
    {
        $table .= "<td style='background-color: $colors[$count]'>" . $colors[$count] . "<br/><span style='color:white;'>" . $colors[$count] . "</span></td>";
        $count++;
    }
    $table .= "</tr>\n";
}
$table .= "</table>";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Grid</title>
</head>
<body>
<?php echo $table; ?>
</body>
</html>
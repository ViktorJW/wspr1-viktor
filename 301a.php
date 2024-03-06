<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.01a</title>
</head>

<?php

    if (!empty($_GET["color"])) 
    {
        $color = $_GET["color"];
    }   else {
        $color = "Grey";
    }

    echo $color
?>

<br>
<a href="<?php echo $_SERVER["PHP_SELF"]; ?>?color=Purple">Purple</a>
<a href="<?php echo $_SERVER["PHP_SELF"]; ?>?color=Yellow">Yellow</a>


<body style="background-color: <?php echo $color?>">
</html>
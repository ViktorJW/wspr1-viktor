<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

    if (!empty($_POST["color"])) 
    {
        $color = $_POST["color"];
    }   else {
        $color = "Grey";
    }

    echo $color
?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>"
method="POST">
    <div>
        <label for="color">Color: </label>
        <input type="text" name="color">
    </div>
    <div>
        <input type="submit" value="Submit" name="Change">
    </div>
<form>


<body style="background-color: <?php echo $color?>">
</html>
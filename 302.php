<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.02</title>
</head>


<a href="<?php echo $_SERVER["PHP_SELF"]; ?>?surname=Micke&lastname=Sandell&age=57">Click</a>

<?php 
    if (!empty($_GET)) 
    {
        echo $_GET["surname"];
        echo $_GET["lastname"];
        echo $_GET["age"];;
    }
?>


</html>
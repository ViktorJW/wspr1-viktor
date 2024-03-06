<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<a href="<?php echo $_SERVER["PHP_SELF"]?>?color=Blue"> Blue </a>
<a href="<?php echo $_SERVER["PHP_SELF"]?>?color=Yellow"> Yellow </a>

    
<?php 

if (!empty($_GET["color"])) 
{
    $color = $_GET["color"];
}   else {
    $color = "Grey";
}

?>

<body style="background-color: <?php echo $color?>"></body>
</html>
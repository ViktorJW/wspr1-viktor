<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.01</title>
</head>
<?php

$t = time();

if ($t%2==0) {
    $color = "grey";
}
else {
    $color = "black";
}
?>
<body style="background-color: <?php echo $color?>">

</body>
</html>
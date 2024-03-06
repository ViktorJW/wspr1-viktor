<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.05 member</title>
</head>

<?php

    if(isset($_COOKIE["Timer"])) {
        echo $_COOKIE["Timer"];
    }

    //Om kakan inte är satt så omdirgeras man till login sidan
    if(!isset($_COOKIE["Timer"])) {
        header("Location: http://localhost:8080/305-login.php");
        exit();
    }

?>

<body>
</body>
<?php
   
?>
</html>
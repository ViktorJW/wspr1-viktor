<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.04 member</title>
</head>
<body>
    <h1>Logged in</h1>
</body>
<?php

    if ($_SESSION["loggedIn"] == false) {
        header("Location: http://localhost:8080/304-login.php");
        exit();
    }
?>
</html>
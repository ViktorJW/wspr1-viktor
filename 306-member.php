<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.06 member</title>
</head>

<?php

    //Varabeln till textfilen
    $file = "notes.txt";

    //Om något har hänt i $_POST
    if (!empty($_POST)) {
        //Öppnar filen och sätter den på "append" eller "dör"
        $handle = fopen($file,"a") or die("Unable to open file!");

        //Skriver in det som skrevs i formuläret samt tiden den skrevs
        $note = ($_POST["note"]);
        fwrite($handle, time() .": ". $note . "<br>\n");

        //stänger filen
        fclose($handle);
    }

?>


<body>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
        <div>
            <label for="note">note: </label>
            <input type="text" name="note">
        </div>
        <div>
            <input type="submit" value="Send" name="Change">
        </div>
    <form>

    <h1>My notes</h1>
    <?php 
    //läser filen på sidan
    if(file_exists($file)) {
       readfile($file);
    }
    ?>




</body>
<?php
    //Gör så att om man inte har loggat in blir man omdirigerad till "304-login.php"
    if ($_SESSION["loggedIn"] == false) {
        header("Location: http://localhost:8080/304-login.php");
        exit();
    }
?>
</html>
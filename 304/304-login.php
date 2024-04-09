<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.04 login</title>
</head>

<?php 

    //Lösenordet och namnet man behöver för att komma in på sidan
    $password = "1";
    $name = "1";

    //Gör så att man inte kan gå in på membersidan om man inte har loggat in
    $loggedin = false;


    $nameLogin = $passwordLogin = "";

    //tar svaren från formuläret och lägger in det i en variabel
    if (!empty($_POST)) 
    {
        $nameLogin = $_POST["nameLogin"];
        $passwordLogin = $_POST["passwordLogin"];
    }

    //Om lösenordet och namnet du har skrivit in matchar med $password och $name kommer man omdirigeras till "304-member.php"
    //Samt kommer också $loggedIn variabeln bli true så att man kan gå in 
    if ($password == $passwordLogin && $name == $nameLogin) {
        $_SESSION["loggedIn"] = true;
        header("Location: http://localhost:8080/304-member.php");
        exit();
    }
?>


<body>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
        <div>
            <label for="nameLogin">Username: </label>
            <input type="text" name="nameLogin">
        </div>
        <div>
            <label for="passwordLogin">Password: </label>
            <input type="text" name="passwordLogin">
        </div>
        <div>
            <input type="submit" value="Send" name="Change">
        </div>
    <form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.05 login</title>
</head>

<?php 

    //Lösenordet och namnet man behöver för att komma in på sidan
    $password = "1";
    $name = "1";


    $nameLogin = $passwordLogin = "";

    //tar svaren från formuläret och lägger in det i en variabel
    if (!empty($_POST)) 
    {
        $nameLogin = $_POST["nameLogin"];
        $passwordLogin = $_POST["passwordLogin"];
    }

    //Om lösenordet och namnet du har skrivit in matchar med $password och $name kommer man omdirigeras till "305-member.php"
    //Samt kommer också en cookie läggas till
    if ($password == $passwordLogin && $name == $nameLogin) {

        header("Location: http://localhost:8080/305-member.php");
        setcookie("Timer", "loggedIn", time() + 100);
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
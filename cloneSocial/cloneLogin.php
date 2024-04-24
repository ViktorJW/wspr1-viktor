<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'Viktor');
define('DB_PASS', '123');
define('DB_NAME', 'social_clone');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login - Rabbit</title>
</head>

<?php

$nameLogin = $passwordLogin = "";
$wrongDetails = "Wrong Username or Password";

//tar svaren från formuläret och lägger in det i en variabel
if (isset($_POST['submit'])) {
    $nameLogin =  filter_input(INPUT_POST, 'nameLogin', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $passwordLogin =  filter_input(INPUT_POST, 'passwordLogin', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //Använder användarnamnet för att kunna få tillgång till rätt lösenord
    $sql = "SELECT * FROM `Users` WHERE username = '$nameLogin'";
    $sqlUser = mysqli_query($conn, $sql);
    $sqlItems = mysqli_fetch_assoc($sqlUser);


    //Kollar om lösenordet som är inskrivet är samma som databasens
    if (password_verify($passwordLogin, $sqlItems["password"])) {
       
        session_start();
        $_SESSION["LoggedIn"] = True;
        $_SESSION["User"] = $nameLogin;
        $_SESSION["ID"] = $sqlItems["ID"];

        header("location: cloneMember.php");
        
    } else {
        echo $wrongDetails;
    }  
}

?>

<body>

    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
        <div>
            <label for="nameLogin">Username: </label>
            <input type="text" name="nameLogin" required>
        </div>
        <div>
            <label for="passwordLogin">Password: </label>
            <input type="text" name="passwordLogin" required>
        </div>
        <div>
            <input type="submit" value="Login" name="submit">
        </div>
    <form>

    <a href="http://localhost:8080/cloneSocial/cloneRegister.php">Sign Up</a>
</body>
</html>
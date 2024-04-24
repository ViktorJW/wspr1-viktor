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
    <title>Register - Rabbit</title>
</head>

<?php

$registerName = $registerPassword = "";
$nameErr = $passwordErr = "";

if (isset($_POST['submit'])) {

    if (empty($_POST["registerName"])) {
        $nameErr = "Name is required";
        } else {
            $name = $_POST["registerName"];
            //Kollar om det finns dubbletter;
            $num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username = '$name'"));
            if($num < 1) {
                $registerName = filter_input(INPUT_POST, "registerName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            } else {
                $nameErr = "Name already exsist";
        }
    }


    if (strlen($_POST["registerPassword"] <= 8)) {
        $passwordErr = "Password too short, min 8 characters";
        } else {
            $registerPassword = filter_input(INPUT_POST, "registerPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $hashRegisterPassword = password_hash($registerPassword, PASSWORD_DEFAULT);
    }

    if (empty($nameErr) && empty($passwordErr)) {
        $sqlSend = "INSERT INTO users (username, password) VALUES ('$registerName', '$hashRegisterPassword')";
        if (mysqli_query($conn, $sqlSend)) {
            header("Location: cloneLogin.php");
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    } else {
        echo $nameErr;
        echo $passwordErr;
    }
}

?>

<body>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
        <div>
            <label for="registerName">Username: </label>
            <input type="text" name="registerName" pattern="[A-Za-z0-9]{1,}" required>
        </div>
        <div>
            <label for="registerPassword">Password: </label>
            <input type="text" name="registerPassword" required>
        </div>
        <div>
            <input type="submit" value="Register" name="submit">
        </div>
    <form>

    <a href="http://localhost:8080/cloneSocial/cloneLogin.php">Sign In</a>
</body>

</html>
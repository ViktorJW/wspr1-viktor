<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'Viktor');
define('DB_PASS', '123');
define('DB_NAME', 'social_clone');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/* TO DO LIST:
Gör så att man kan söka på andra personer - under progress - Gjort så att man ser vad personen har postat
Gör så att man kan se vem som har postat (kanske "lika" och "kommentera") - halft klar - paused
Följar system
Om man refreshar sidan kommer den fråga om man vill skicka in formuläret igen vilket kommer leda till att man har 2 av samma post
*/


if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} 

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rabbit - Hop Into Anything</title>
</head>

<body>
    <?php 

    $Sign = "Sign In";

    //special saker
    if (isset($_SESSION["LoggedIn"])) {
        echo $_SESSION["User"];
        $Sign = "Sign Out";
    } 

    echo "    <a href='http://localhost:8080/cloneSocial/cloneLogin.php'>$Sign</a>";
    ?>

    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="GET">
        <div>
            <label for="get">Search For users: </label>
            <input type="text" name="get">
        </div>
        <div>
            <input type="submit" value="wtf" name="submitted">
        </div>
    <form>

    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
        <div>
            <label for="post">Create Post: </label>
            <input type="text" name="post">
        </div>
        <div>
            <input type="submit" value="Post" name="submit">
        </div>
    <form>

    <?php
        //skicka in det du posta :)
        if (isset($_POST['submit'])) {
            $Post = filter_input(INPUT_POST, 'post', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ID = $_SESSION["ID"];
            $name = $_SESSION['User'];
            $sqlSend = "INSERT INTO `posts` (post, ID, username) VALUES ('$Post', '$ID', '$name')";
            $result1 = mysqli_query($conn, $sqlSend);
        }

        if (isset($_Get['submitted'])) {
            header("location: cloneProfile.php?ID='get'");
        }


        //skaffa alla posts
        $sql = 'SELECT * FROM `posts`';
        $result = mysqli_query($conn, $sql);
        $post = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>

            
    <h2>Posts</h2>

    <!-- om ingen post har gjorts -->
    <?php if (empty($post)): ?>
        <p>There is no posts :(</p>
    <?php endif; ?>

     <!-- om posts har gjorts -->
    <?php foreach ($post as $item): ?>
        <?php echo $item['post']; ?>
        <div> By <?php echo $item['username']; ?> on <?php echo date_format(date_create($item['date']),'g:ia \o\n l jS F Y'); ?></div>
        </div>
    </div>
    <?php endforeach; ?>

</body>

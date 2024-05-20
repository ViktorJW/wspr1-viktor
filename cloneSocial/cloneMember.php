<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'Viktor');
define('DB_PASS', '123');
define('DB_NAME', 'social_clone');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/* TO DO LIST:
Gör så att man kan se vem som har postat (kanske "lika" och "kommentera") - halft klar - man kan se vem som har postat
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
    <link rel="stylesheet" href="cloneSocial.css">
</head>

<br>
    <?php 

    //skickar dig tillbaka till login om du inte har loggat in
    if (isset($_SESSION["LoggedIn"])) {
        echo $_SESSION["User"];
    } else {header("Location: cloneLogin.php");};

    ?>
    <a href='./cloneLogin.php'>Sign Out</a>

    <br></br>

    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="GET">
      <input type="text" placeholder="Search for users" name="search">
      <button type="submit">Search</button>
    </form>

    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
        <input type="text" name="Post" placeholder="Create Post" required>
        <input type="submit" value="Post" name="submit">
    <form>

    <?php
        if (isset($_GET['search'])) {
            $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            header("Location: cloneProfile.php?username=$search");
        }

        //skicka in det du posta :)
        if (isset($_POST['submit'])) {
            $Post = filter_input(INPUT_POST, 'Post', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ID = $_SESSION["ID"];
            $sqlSend = "INSERT INTO `posts` (post, ID) VALUES ('$Post', '$ID')";
            $result = mysqli_query($conn, $sqlSend);

    
        }

        //skaffa alla posts
        $sql = 'SELECT * FROM posts, users WHERE users.ID = posts.ID ORDER BY `date` DESC';
        $sql = mysqli_query($conn, $sql);
        $sql = mysqli_fetch_all($sql, MYSQLI_ASSOC);

    ?>

            
    <h2>Posts</h2>

    <!-- om ingen post har gjorts -->
    <?php if (empty($sql)): ?>
        <p>There is no posts :(</p>
    <?php endif; ?>

     <!-- om posts har gjorts -->
    <?php foreach ($sql as $item): ?>
        <div class="container">
            <?php echo $item['post']; ?>
            <br></br>
            <div> By <?php echo $item['username']; ?> on <?php echo date_format(date_create($item['date']),'g:ia \o\n l jS F Y'); ?></div>
        </div>
    <?php endforeach; ?>

</body>

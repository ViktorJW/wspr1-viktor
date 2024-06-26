<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'Viktor');
define('DB_PASS', '123');
define('DB_NAME', 'social_clone');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
    <title>Rabbit - Profile Page</title>
    <link rel="stylesheet" href="cloneSocial.css">
</head>


<body>
    <?php
        $username = strval($_GET["username"]);

        $dbInfo = "SELECT * FROM `users` WHERE username = '$username'";
        $dbInfo = mysqli_query($conn, $dbInfo);
        $dbInfo = mysqli_fetch_array($dbInfo);

        $sql = "SELECT * FROM posts, users WHERE users.ID = posts.ID AND users.username = '$username' ORDER BY `date` DESC";
        $sql = mysqli_query($conn, $sql);
        $sql = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    ?>

            
    <h2>Posts From <?php echo $username;?></h2>

    <!-- om ingen post har gjorts -->
    <?php if (empty($sql)): ?>
        <p>There is no posts from this user :(</p>
    <?php endif; ?>

     <!-- om posts har gjorts -->
    <?php foreach ($sql as $item): ?>
        <div class="container">
            <?php echo $item['post']; ?>
            <div> By <?php echo $item['username']; ?> on <?php echo date_format(date_create($item['date']),'g:ia \o\n l jS F Y'); ?></div>
        </div>
    <?php endforeach; ?>

</body>
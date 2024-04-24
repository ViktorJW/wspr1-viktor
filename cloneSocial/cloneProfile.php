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
</head>


<body>
    <?php
        $ID = $_GET["ID"];

        $dbInfo = "SELECT * FROM `users` WHERE ID = '$ID'";
        $dbResult = mysqli_query($conn, $dbInfo);
        $dbItems = mysqli_fetch_array($dbResult);
 
        $user = $dbItems['username'];

        $sql = "SELECT * FROM `posts` WHERE ID = '$ID'";
        $result = mysqli_query($conn, $sql);
        $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

            
    <h2>Posts From <?php echo $user ?></h2>

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
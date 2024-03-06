<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.03</title>
</head>

<?php

    #Variabler för att kunna gömma formuläret
    $hideInput ="text";
    $hideSubmit = "submit";
    $hideLabel = "";

    #Variabler som sätts till inget när man startar eller laddar om sidan
    $surname = $lastname = $age = "";

    #Om $_POST inte är tom
    if (!empty($_POST)) 
    {
        #Lägger värden variabler, samt gömmer formuläret
        $surname = $_POST["surname"];
        $lastname = $_POST["lastname"];
        $age = $_POST["age"];
        $hideInput = "hidden";
        $hideSubmit = "hidden";
        $hideLabel = "hidden";
    }

    #Visar variabler från formuläret
    echo $surname;
    echo $lastname;
    echo $age;
    
?>

<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <div>
            <label <?php echo $hideLabel?> for="surname">Name: </label>
            <input type="<?php echo $hideInput?>" name="surname">
        </div>
        <div>
            <label <?php echo $hideLabel?> for="lastname">Lastname: </label>
            <input type="<?php echo $hideInput?>" name="lastname">
        </div>
        <div>
            <label <?php echo $hideLabel?> for="age">Age: </label>
            <input type="<?php echo $hideInput?>" name="age">
        </div>
        <div>
            <input type="<?php echo $hideSubmit?>" value="Skicka" name="Change">
        </div>
    <form>
</body>

</html>
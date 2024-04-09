<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.03s</title>
</head>

<?php
    #Variabler för att kunna gömma formuläret
    $hideInput ="text";
    $hideSubmit = "submit";
    $hideLabel = "";

    #Gör så att variabler blir tomma.
    $surname = $lastname = $age = "";
    
    #Saniterar variablerna
    if (!empty($_POST)) {
        $surname = test_input($_POST["surname"]);
        $lastname = test_input($_POST["lastname"]);
        $age = test_input($_POST["age"]);

        $hideInput = "hidden";
        $hideSubmit = "hidden";
        $hideLabel = "hidden";
    }
    
    #Funtionen för att kunna Sanitera variablerna
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    echo $surname;
    echo $lastname;
    echo $age;
?>



<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
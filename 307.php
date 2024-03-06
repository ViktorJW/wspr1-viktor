<?php

    $message = "";

    //Om något skickat in formuläret
    if(isset($_POST["submit"])) {
        //Tillåtna ändelser
        $allowedExt = array("png");

        //Om det inte är tomt
        if(!empty($_FILES["upload"]["name"])) {
            $fileName = $_FILES["upload"]["name"];
            $fileSize = $_FILES["upload"]["size"];
            $file_tmp = $_FILES["upload"]["tmp_name"];

            //Vart filen ska åka när den har passerat alla delar
            $target_dir = "uploads/${fileName}";

            //Dela upp filen och spara ändelsen i separat variabel
            $fileExt = explode(".", $fileName);
            $fileExt = strtolower(end($fileExt));

            //Om ändelsen i "$fileExt" matchar något i "$allowedExt"
            if(in_array($fileExt, $allowedExt)) {
                //Om Storleken är mindre än 500kB
                if($fileSize <= 500000) {
                    move_uploaded_file($file_tmp, $target_dir);
                    $message = ":)";

                    //Om filen är förstor
                }   else {$message = "File too large";}

                //Om det är fel typ av fil
            }   else {$message = "Wrong filetype";}

            //Om det är tomt
        }   else {$message = "Choose a file";} 
    }
    echo $message;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.07</title>
</head>


<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
        Select image to upload:
        <div>
            <input type="file" name="upload">
        </div>
        <div>
            <input type="submit" value="Submit" name="submit">
        </div>
    </form>
</body>
</html>
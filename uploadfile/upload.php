<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
echo '
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <div class="container">
    ';

echo "<h1> uploading file to the server </h1> ";

// var_dump($_POST);


// var_dump($_FILES);


    if(!empty($_FILES["file"]["name"])){
            echo "file found";

            $filename = $_FILES["file"]["name"];
            $tmpname = $_FILES["file"]["tmp_name"];
            move_uploaded_file($tmpname, "files/{$filename}");
            echo "<img src='files/{$filename}' width='500' height='500'>";
    }











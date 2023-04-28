<?php

    $errors= [];
if(isset($_GET["errors"])){

        $errors = $_GET["errors"];

        $errors = json_decode($errors); 

        $errors = (array)$errors;

    }
    if(isset($_GET["old"])){
        $old_data = json_decode($_GET["old"]);
        $old_data = (array)$old_data;

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body style="color: rgb(247, 241, 241);">

    <div class="container">
        <div class="m-auto ">
        <h1 class="text-center">Login to my website</h1>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email"

                       value="<?php if(isset($old_data['email'])){echo $old_data['email'];}?>"

                       id="exampleInputEmail1" aria-describedby="emailHelp">
                <h4 class="text-danger text-"> <?php if(isset($errors["email"])){echo $errors["email"];} ?></h4>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password"
                       value="<?php if(isset($old_data['password'])){echo $old_data['password'];}?>"

                       id="exampleInputPassword1">
                <h4 class="text-danger text-"> <?php if(isset($errors["password"])){echo $errors["password"];} ?></h4>

            </div>

            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


</body>
</html>
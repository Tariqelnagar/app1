<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
echo '
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    ';
echo "<div class='container'>";
echo "<h1> update user </h1>";
 

$update_id = $_GET["id"];

$userskills= "";
if(isset($_POST["skills"])) {
    $skills = $_POST["skills"];

    $userskills=implode(",",$skills);
}
$userimg=$_post["oldimg"];
if(!empty($_FILES["userimg"]["name"])){
    $img_found = true;
    $tmpname= $_FILES ["userimg"]["tmp_name"];
    $imgname=$_FILES["userimg"]["name"];
    $imginfo=pathinfo ($imgname);
    $ext =$imginfo["extension"];
    $ext = strtolower($ext);
    move_uploaded_file($tmpname, "{$update_id}.{$ext}");
    $userimg="{$update_id}.{$ext}";
}

$edited_userdata= "{$update_id}:{$_POST['firstname']}:{$_POST['lastname']}:{$_POST['address']}:{$_POST['country']}:{$_POST['gender']}:{$_POST['phone']}:{$_POST['email']}:{$_POST['password']}:{$userimg}:{$userskills}\n";




$allusers = file("users.txt");  # read file into an array

foreach ($allusers as $index=>$user){
        $userinfo = trim($user,"\n");
        $userinfo= explode(":", $userinfo);
        if ($userinfo[0]==$update_id){
            echo "userfound";
                $allusers[$index]= $edited_userdata;
            break;
        }
}




$fileobj = fopen("users.txt", "w");
foreach ($allusers as $user){
    $user= trim($user, "\n");
    fwrite($fileobj, $user.PHP_EOL);
}

header("Location:userstable.php");


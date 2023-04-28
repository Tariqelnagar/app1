<?php 


    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    ';

    ####check errors

    $img_ext = false;
    $img_found = false;
    if(!empty($_FILES["userimg"]["name"])){
        $img_found = true;
        $imgname=$_FILES["userimg"]["name"];
        $imginfo=pathinfo ($imgname);
        $ext =$imginfo["extension"];
        
        // var_dump($_ext)

        $ext = strtolower($ext);
        $allowed_ext = ["png",'jpg','jpeg','webp'];
        if(in_array( $ext, $allowed_ext)){
           $img_ext = true;
        }
    }



        $errors= [];
        $old_data = [];
    if(empty($_POST["firstname"])){
            $errors["firstname"]= "firstname needed";

        }else{
            $old_data["firstname"]= $_POST["firstname"];

        }

        if(empty($_POST["lastname"])){
            $errors["lastname"]= "lastname needed";

        }else{
            $old_data["lastname"]= $_POST["lastname"];

        }

        if(empty($_POST["email"])){
            $errors["email"]= "email needed";

        }else{
            $old_data["email"]= $_POST["email"];

        }

        if(empty($_POST["password"])){
            $errors["password"]= "password needed";

        }else{
            $old_data["password"]= $_POST["password"];

     }
        if($img_found==false and $img_ext==false){
            $errors["userimg"]= "extension not allowed";

        }
    if(count($errors)>0){
        $errors=json_encode ($errors);
        if(count($old_data)>0){
            $old_data=json_encode ($old_data);
            header("location:form.php?errors={$errors}&old={$old_data}");

            }elseif (count($errors)> 0){
                header("location:form.php?errors={$errors}");

            }

    }else {
        $id=time();

        $userimg="";

        if($img_found){
            $tmpname=$_FILES["userimg"]["tmp_name"];
            
           $rest= move_uploaded_file($tmpname, "{$id}.{$ext}" );
        //    var_dump($rest);
        $userimg="{$id}.{$ext}";
            

        }

        echo "<div class='container'> ";
        echo "<h1> Please review your information , save data in the file </h1>";
        
        
        //  var_dump($_POST);
        //    var_dump($_FILES);
    

    

    
        $userskills= "";
        if(isset($_POST["skills"])) {
            $skills = $_POST["skills"];
            $userskills=implode(",",$skills);
        }
            
        // var_dump($userskills);
    
    

    
        $userdata= "{$id}:{$_POST['firstname']}:{$_POST['lastname']}:{$_POST['address']}:{$_POST['country']}:{$_POST['gender']}:{$_POST['phone']}:{$_POST['email']}:{$_POST['password']}:{$userskills}:{$userimg}\n";
        var_dump($userdata);
    
    
        $fileobject = fopen("users.txt", "a");
        fwrite($fileobject, $userdata);
        fclose($fileobject);
    
        echo "</div>";
    
        header("Location:userstable.php");
    
    
         }
     
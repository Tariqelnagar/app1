<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
echo '
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    ';
echo "<div class='container'>";
$user_id = $_GET["id"];
//var_dump($user_id);


$allusers = file("users.txt");
foreach ($allusers as $index=>$user){
    $userinfo = trim($user, "\n");
    $userinfo = explode(":", $userinfo);
    if($userinfo[0]==$user_id){
        $edited_user = $userinfo;
        break;
    }
}

    $php= false;
    $html =false;
    $css= false;
    if($edited_user[9]){

        $skills=trim($edited_user[9],"\n");
        $skills = explode(",", $skills);
        foreach ($skills as $skill){
            if ($skill=="php"){
                $php=true;
            }elseif ($html=="html"){
                $html=true;
            }elseif ($skill=="css"){
                $css=true;
            }
        }
    }
?>

<h1> Edit User </h1>
<form action="update.php?id=<?php echo $edited_user[0];?>" method="POST" enctype="multipart/form-data">
<body style="color: rgb(247, 241, 241);">
<div class="from-group">
    <label class="form-label">First Name</label>
    <input type="text" name="firstname" class="form-control"  value="<?php echo $edited_user[1]; ?>" >
</div>


  <div class="from-group">
    <label for="name">Last Name</label>
    <input type="text" name="lastname" class="form-control"  value="<?php echo $edited_user[2]; ?>" >
  </div>
<div class="form-group" >
  <label for="address">address</label>
  <textarea id="address" name="address" class="form-control"  value="<?php echo $edited_user[3]; ?>" ></textarea>
</div>




<div class="form-group">
    <label>Country</label>
    <select class="form-control" name="country" required  value="<?php echo $edited_user[4]; ?>" >
        <option>--Select--</option>
        <option value="Egypt">Egypt</option>
        <option value="Canada">Canada</option>
        <option value="France">France</option>
        <option value="Others" selected>Others</option>
    </select>
</div>

<div>
        <label for="exampleInputPassword1" class="form-label">Gender</label>
        <div class="form-check form-check-inline">
            <?php
                if($edited_user[5]=="male") {
                    echo '
                   <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" 
                   value="male" checked>';
                }else{
                   echo'<input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                   value="male">';
                }
             ?>
            <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>
        <div class="form-check form-check-inline">
            <?php
            if($edited_user[5]=="female") {
                echo '<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" 
                   value="female" checked>';
            }else{
                echo'<input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                   value="female">';
            }
            ?>
            <label class="form-check-label" for="inlineRadio2">Female</label>
        </div>
    </div>


    <div class="mb-3">
        <label class="form-label" for="customFile">Choose your file</label>
        <input type="file" class="form-control" name="userimg" id="customFile" />
        <img src="<?php echo $edited_user[10];?>" width="200" height="200">
        <input type="hidden" name="oldimg " value="<?php echo $edited_user[10]; ?>" >
        </div>

            <div class="form-group">
            <label for="phone">phone</label>
            <input type="tel" class="form-control" name="phone" value="<?php echo $edited_user[6]; ?>" >
            </div>

            <div class="form-group">
            <label class="md-2 ">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $edited_user[7]; ?>" >
            </div>

            <div class="form-group">
            <label class="md-2 ">password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $edited_user[8]; ?>" >
            </div>
            <div>


    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">skills</label>

        <div class="form-check">
            <?php
                if($php){
                    echo '<input class="form-check-input" type="checkbox"  name="skills[]" value="php" checked >';
                }else{
                    echo '<input class="form-check-input" type="checkbox"  name="skills[]" value="php" >';
                }
            ?>
            <label class="form-check-label" >
                php
            </label>
        </div>

        <div class="form-check">
            <?php
            if($html){
                echo '<input class="form-check-input" type="checkbox"  
                name="skills[]" value="html" checked >';
            }else{
                echo '<input class="form-check-input" type="checkbox" 
                name="skills[]" value="html" >';
            }
            ?>

            <label class="form-check-label" >
                html
            </label>
        </div>

        <div class="form-check">
            <?php
            if($css){
                echo '<input class="form-check-input" type="checkbox"  name="skills[]" 
                value="css" checked >';
            }else{
                echo '<input class="form-check-input" type="checkbox"  name="skills[]" 
                value="css" >';
            }
            ?>
            <label class="form-check-label" >
                css
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-light ">submit</button>
  <button type="reset" class="btn btn-light md-2 ">reset</button>
  
</form>
      
</div>
        </body>


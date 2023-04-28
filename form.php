<?php
// var_dump($_GET)

  if(isset($_GET["errors"])){

    $errors= json_decode ($_GET["errors"]);

    $errors=(array)$errors;
  }
  if(isset($_GET["old"])){
    $old= json_decode ($_GET["old"]);

    $old=(array)$old;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>register form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body style="color: rgb(247, 241, 241);">
<div class="container">
    <h1> Register your information</h1>
<form action="register.php" method="POST" enctype="multipart/form-data">

  <div class="from-group">
    <label class="form-label">First Name</label>
    <input type="text" name="firstname" value="<?php if(isset($old['firstname'])){echo $old['firstname'];} ?>" class="form-control"  >
    <label class="h5 text-danger"> <?php if(isset($errors['firstname'])){echo $errors['firstname'];} ?> </label>
</div>


  <div class="from-group">
    <label for="name">Last Name</label>
    <input type="text" name="lastname" value="<?php if(isset($old['lastname'])){echo $old['lastname'];} ?>" class="form-control"  >
    <label class="h5 text-danger"> <?php if(isset($errors['lastname'])){echo $errors['lastname'];} ?> </label>
  </div>
<div class="form-group" >
  <label for="address">address</label>
  <textarea id="address" name="address" class="form-control"></textarea>
</div>

  <div class="form-group">
    <label>Country</label>
    <select class="form-control" name="country" required>
        <option>--Select--</option>
        <option value="Egypt">Egypt</option>
        <option value="Canada">Canada</option>
        <option value="France">France</option>
        <option value="Others" selected>Others</option>
    </select>
</div>


<div class="mb-3">
        <label class="form-label" for="customFile">Choose your file</label>
        <input type="file" class="form-control" name="userimg" id="customFile" />
        <label class="h5 text-danger"> <?php if(isset($errors['userimg'])){echo $errors['userimg'];} ?> </label>
    </div>

<div>
  <label for="exampleInputPassword1" class="form-label">Gender</label>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
  <label class="form-check-label" for="inlineRadio1">Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
  <label class="form-check-label" for="inlineRadio2">Female</label>
</div>
</div>


<div class="mb 3">
<label for=" example input password1" class="form-label">skills</label>

<div class="form-check">

<input class="form-check-input" type="checkbox" name="skills[]" value="php">
<label class="form-check-label">php</label>

</div>
  
  <div class="form-check">
  
  <input class="form-check-input" type="checkbox" name="skills[]" value="html">
  <label class="form-check-label">html</label>
  
  </div>

    
    <div class="form-check">
    
    <input class="form-check-input" type="checkbox" name="skills[]" value="css">
    <label class="form-check-label">css</label>
    
    </div>

</div>
  
  <div class="form-group">
    <label for="phone">phone</label>
    <input type="tel" class="form-control" name="phone"  >
  </div>

  <div class="form-group">
    <label class="md-2 ">Email</label>
    <input type="email" class="form-control" name="email"  value="<?php if(isset($old['lastname'])){echo $old['lastname'];} ?>" >
    <label class="h5 text-danger"> <?php if(isset($errors['email'])){echo $errors['email'];} ?> </label>
  </div>

  <div class="form-group">
    <label class="md-2 ">password</label>
    <input type="password" class="form-control" name="password"  >
    <label class="h5 text-danger"> <?php if(isset($errors['password'])){echo $errors['password'];} ?> </label>
  </div>
  <div>


  <button type="submit" class="btn btn-light ">submit</button>
  <button type="reset" class="btn btn-light md-2 ">reset</button>
  
</form>
      
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>
   
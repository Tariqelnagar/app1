<?php 

    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="reg.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    ';

    echo "<div class='container'> ";

    $usersdata=file("users.txt");

    // var_dump($usersdata);

    echo "<h1>All users </h1>";
    echo "
    <table class='table table-dark'>
      <thead>
        <tr>
          <th>ID</th> <th>first name</th><th>last name</th> <th>address</th><th>country</th><th>gender</th><th>phone</th><th>email</th><th>password</th><th>skills</th>
          <th>image</th>  <th>Edit</th> <th>Delete</th> 
        </tr>
      </thead>
      <tbody>";

      foreach ($usersdata as $user){
        $u = trim($user, "\n");                       ##to remove /n##

        $userinfo=explode(":",$u );                  ##to split string into an array##
        // var_dump($u);
        echo "<tr>";
            foreach ($userinfo as $index=>$i){
              if($index==10){

                echo "<td><img src='{$i}'width='50' height='50' ></td>";
              }else{

                echo "<td> {$i} </td>";
              }

            }
        echo "<td><a href='edit.php?id={$userinfo[0]}' class='btn btn-light'>Edit</a></td> 
        <td><a href='delete.php?id={$userinfo[0]}' class='btn btn-danger'>Delete</a></td>
        </tr>";
      }
      echo "<a class='btn btn-warning' href='form.php'> add new user</a></div>";
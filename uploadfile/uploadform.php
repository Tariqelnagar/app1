
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="m-auto ">
        <h1 class="text-center">Upload file to the server</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label" for="customFile">Choose your file</label>
                <input type="file" class="form-control" name="file" id="customFile" />
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">File Description</label>
                <input type="text" class="form-control" name="descrtiption"


                       id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


</body>
</html>
<?php

$con = mysqli_connect('localhost','root');

mysqli_select_db($con,'curd');

if (isset($_POST['done'])) {

    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $files = $_FILES['file'];

    $filename = $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];

    $fileexe = explode('.', $filename);
    $filecheck = strtolower(end($fileexe));

    $filestore = array('png', 'jpeg', 'jpg');
 

    $destifile =  'upload/' .$filename;
    move_uploaded_file($filetmp, $destifile) ;


    $q = " INSERT INTO `crudtable`( `username`, `phone`, `email`, `gender`,`photo`) VALUES ( '$username', '$phone' ,'$email','$gender','$destifile')";

    $query = mysqli_query($con, $q);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="col-lg-6 m-auto">

        <form method="post">

            <br><br>
            <div class="card">

                <div class="card-header bg-dark">
                    <h1 class="text-white text-center"> Insert Operation </h1>
                </div><br>

                <label> Username: </label>
                <input type="text" name="username" class="form-control" autocomplete="off"> <br>

                <label> phone: </label>
                <input type="text" name="phone" class="form-control" autocomplete="off"> <br>

                <label> email: </label>
                <input type="email" name="email" class="form-control" autocomplete="off"> <br>

                <label> gender : </label>
                <input type="text" name="gender" class="form-control" autocomplete="off"> <br>

                <label>Photo : </label>
                <input type="file" name="file" id="file" class="from-control">

                <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

            </div>
        </form>
    </div>
    <div class="text-center">

        <a href="display.php">Display</a>

    </div>
</body>

</html>
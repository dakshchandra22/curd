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
                 <?php

                    include 'conn.php';

                    $con = mysqli_connect('localhost', 'root');

                    mysqli_select_db($con, 'curd');


                $id = $_GET['id'];
                $q = " SELECT * FROM `crudtable` where id=$id";
                    
                $query = mysqli_query($con, $q);

                while ($row = mysqli_fetch_array($query)) {

                    ?>

                 <div class="card-header bg-primary">
                     <h1 class="text-white text-center">View details </h1>
                 </div><br>

                 <label> Id : </label>
                 <input type="text" name="id" value="<?php echo $row['id']; ?>" class="form-control"> <br>

                 <label> Username: </label>
                 <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control"> <br>

                 <label> phone: </label>
                 <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control"> <br>

                 <label> email: </label>
                 <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"> <br>

                 <label> gender : </label>
                 <input type="text" name="gender" value="<?php echo $row['gender']; ?>" class="form-control"> <br>

                 <?php
                }
                ?>

             </div>
         </form>
     </div>
 </body>
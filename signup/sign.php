<?php

$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

   
    

    $sql="SELECT * FROM `registration` WHERE username='$username'";

    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
           // echo "User already exist";
           $user=1;
        }else{
            $sql="INSERT INTO `registration`(username,password) VALUES ('$username','$password')";
            $result=mysqli_query($con,$sql);

            if($result){
               // echo "SignUp successfully";
               $success=1;
               header('location:login.php');
            }
            else{
                die(mysqli_error($con));
            }
        

        }
    }
}




?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign Up</title>
  </head>
  <body>
      <?php

      if($user){
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Ohh no sorry</strong> User already exist.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      }
      
      
      ?>
       <?php

if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfull</strong> You are successfully signed up.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}


?>




      <h1 class="text-center">Sign Up Page</h1>
    <div class="container mt-5">
    <form action="sign.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="username"  placeholder="Enter your name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
  </div>
  
 
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
    </div>

    
  </body>
</html>
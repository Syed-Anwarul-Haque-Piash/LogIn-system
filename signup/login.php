<?php

$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

   
    

    $sql="SELECT * FROM `registration` WHERE username='$username'AND password='$password'";

    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
           // echo "User already exist";
           $login=1;
          //echo "Login Successfull";
          session_start();
          $_SESSION['username']=$username;
          header('location:home.php');
        }else{
            //echo "Invalid Data";
            $invalid=1;
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

    <title>Login Up</title>
  </head>
  <body>
      <?php
       if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> You are successfully logged in.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
      ?>
      <?php
       if($invalid){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error404</strong> Invalid
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
      ?>
      




      <h1 class="text-center">Login to our website</h1>
    <div class="container mt-5">
    <form action="login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="username"  placeholder="Enter your name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
  </div>
  
 
  <button type="submit" class="btn btn-primary">login</button>
</form>
    </div>

    
  </body>
</html>
<?php
  session_start();
  include('include/connection.php');
  if(isset($_POST['login'])){

    $uname = $_POST['uname'];
    $password = $_POST['pass'];




    $row = mysqli_fetch_array($qq);

    if(empty($uname)){
      echo "<script>alert('Enter Username')</script>";
    }else if(empty($password)){
      echo "<script>alert('Enter Password')</script>";
    }else{
      $query = "SELECT * FROM patient WHERE username='$uname' AND password='$password'";
      $res = mysqli_query($connect,$query);
      if(mysqli_num_rows($res)==1){
        header("Location: patient/index.php");
        $_SESSION['patient'] = $uname;
      }else{
        echo "<script>alert('Invalid Account')</script>";
      }
    }
  }


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Patient Login Page</title>
  </head>
  <body style="background-color: #B8DFD8;">
      <?php include("include/header.php"); ?>

      <div class="container-fluid">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-5 jumbotron">
              <h1 class="text-center my-3">Patient Login</h1>

              <form method="post">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                </div>
                <input type="submit" name="login" class="btn btn-info my-3" value="Login">
                <p>I don't have an account <a href="account.php">Click Here.</a></p>
              </form>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
      </div>
  </body>
</html>

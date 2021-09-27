<?php
  session_start();
  include('include/connection.php');
  if(isset($_POST['login'])){

    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    $q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
    $qq = mysqli_query($connect,$q);

    $row = mysqli_fetch_array($qq);

    if(empty($uname)){
      $error['login'] = "Enter Username";
    }else if(empty($password)){
      $error['login'] = "Enter Password";
    }else if($row['status'] == "Pending"){
      $error['login'] = "Please Wait for Admin to confirm";
    }else if($row['status'] == "Rejected"){
      $error['login'] = "Try again later";
    }


    if(count($error)==0){
      $query = "SELECT * FROM doctors where username='$uname' AND password='$password'";
      $res = mysqli_query($connect,$query);

      if(mysqli_num_rows($res)){
        echo "<script>alert('Done')</script>";
        $_SESSION['doctor']  =$uname;
        header("Location: doctor/index.php");
      }else{
        echo "<script>alert('Invalid Account')</script>";
      }
    }
  }

  if(isset($error['login'])){
    $l = $error['login'];
    $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
  }else{
    $show="";
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Doctor Login Page</title>
  </head>
  <body style="background-color: #B8DFD8">

    <?php include('include/header.php'); ?>

    <div class="container-fluid">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6 jumbotron my-5">
            <h1 class="text-center my-3">Doctors Login</h1>
            <?php echo $show; ?>
            <br>
            <form method="post">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" autocomplete="off">
              </div>

              <input type="submit" name="login" class="btn btn-success" value="Login">
              <div>
                <br>
                <p>I don't have any account <a href="apply.php">Apply Now!!!</a></p>
              </div>
            </form>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </div>
  </body>
</html>

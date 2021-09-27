<?php
  include("include/connection.php");

  if(isset($_POST['create'])){

    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $con_password = $_POST['con_pass'];

    $error = array();

    if(empty($firstname)){
      $error['ac'] = "Enter FirstName";
    }else if(empty($surname)){
      $error['ac'] = "Enter LastName";
    }else if(empty($username)){
      $error['ac'] = "Enter Username";
    }else if(empty($email)){
      $error['ac'] = "Enter Email Address";
    }else if($gender == ""){
      $error['ac'] = "Select your Gender";
    }else if(empty($phone)){
      $error['ac'] = "Enter Phone No.";
    }else if($country == ""){
      $error['ac'] = "Select Country";
    }else if(empty($password)){
      $error['ac'] = "Enter Password";
    }else if($con_password != $password){
      $error['ac'] = "Both Password do not match!";
    }

    if(count($error)==0){

      $query = "INSERT INTO patient(firstname,surname,username,email,phone,gender,country,password,date_reg,profile) VALUES('$firstname','$surname','$username','$email','$phone','$gender','$country','$password',NOW(),'patient.jpeg')";

      $result = mysqli_query($connect, $query);

      if($result){
        echo "<script>alert('You have Successfully Applied!')</script>";
        header("Location: patientlogin.php");
      }else{
        echo "<script>alert('Failed')</script>";
      }
    }
  }

  if(isset($error['apply'])){
    $s = $error['apply'];
    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
  }else{
    $show="";
  }


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Account</title>
  </head>
  <body style="background-color: #B8DFD8">

      <?php  include("include/header.php");?>

      <div class="container-fluid">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-2 jumbotron">
              <h5 class="text-center text-info my-2">Create Account</h5>

              <form method="post">
                <div class="form-group">
                  <label>FirstName</label>
                  <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
                </div>

                <div class="form-group">
                  <label>Surname</label>
                  <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname">
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email-id">
                </div>

                <div class="form-group">
                  <label>Phone No.</label>
                  <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number">
                </div>

                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control" name="gender">
                    <option value="">Select Your Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control" name="country">
                    <option value="">Select Your Country</option>
                    <option value="Russia">Russia</option>
                    <option value="India">India</option>
                    <option value="USA">USA</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                </div>

                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                </div>
                <input type="submit" name="create" value="Create Account" class="btn btn-info my-2">
                <p class="my-2">Already have an account <a href="patientlogin.php">Click here.</a></p>
              </form>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
      </div>
  </body>
</html>

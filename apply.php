<?php
  include("include/connection.php");

  if(isset($_POST['apply'])){

    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if(empty($firstname)){
      $error['apply'] = "Enter FirstName";
    }else if(empty($surname)){
      $error['apply'] = "Enter LastName";
    }else if(empty($username)){
      $error['apply'] = "Enter Username";
    }else if(empty($email)){
      $error['apply'] = "Enter Email Address";
    }else if($gender == ""){
      $error['apply'] = "Select your Gender";
    }else if(empty($phone)){
      $error['apply'] = "Enter Phone No.";
    }else if($country == ""){
      $error['apply'] = "Select Country";
    }else if(empty($password)){
      $error['apply'] = "Enter Password";
    }else if($confirm_password != $password){
      $error['apply'] = "Both Password do not match!";
    }

    if(count($error)==0){

      $query = "INSERT INTO doctors(firstname,surname,username,email,gender,phone,country,password,salary,data_reg,status,profile) VALUES ('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pending', 'doctor.jpeg')";

      $result = mysqli_query($connect, $query);

      if($result){
        echo "<script>alert('You have Successfully Applied!')</script>";
        header("Location: doctorlogin.php");
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
    <title>Apply Now!!!</title>
  </head>
  <body style="background-color: #B8DFD8;">

    <?php include('include/header.php'); ?>

    <div class="container-fluid">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3"></div>
            <div class="col-md-6 my-3 jumbotron">
              <h5 class="text-center">Apply Now!!!</h5>
                <?php echo $show; ?>
              <form method="post">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="FirstName" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
                </div>

                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="LastName" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
                </div>

                <div class="form-group">
                  <label>Email Id</label>
                  <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Email-id" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                </div>

                <div class="form-group">
                  <label>Select Gender</label>
                  <select name="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Phone No." value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                </div>

                <div class="form-group">
                  <label>Select Country</label>
                  <select name="country" class="form-control">
                    <option value="">Select Country</option>
                    <option value="Russia">Russia</option>
                    <option value="India">India</option>
                    <option value="Bhutan">Bhutan</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Password">
                </div>

                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Password">
                </div>

                <input type="submit" name="apply" value="Apply Now" class="btn btn-success">
                <div>
                  <br>
                  <p>I already have an account <a href="doctorlogin.php">Click here!</a></p>
                </div>
              </form>
            </div>
            <div class="col-md-3"></div>
        </div>
      </div>
    </div>
  </body>
</html>

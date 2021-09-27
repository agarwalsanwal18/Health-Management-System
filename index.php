<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HMS Home Page</title>
  </head>
  <body>
    <?php include("include/header.php"); ?>

    <div style="margin-top: 50px;"></div>
    <div class="container">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3 mx-1 shadow">
            <img src="images/more_info.jpeg" style="width: 100%; height: 190px;">

            <h5 class="text-center">Click on the button for more information.</h5>

            <a href="#">
              <button class="btn btn-success my-3" style="margin-left: 20%;">More Information</button>
            </a>

          </div>
          <div class="col-md-4 mx-1 shadow">
            <img src="images/patient.jpeg" style="width: 100%;" alt="">

            <h5 class="text-center">Create Account so that we can take good care of you.</h5>

            <a href="account.php">
              <button class="btn btn-success my-3" style="margin-left: 30%;">Create Account!!</button>
            </a>

          </div>
          <div class="col-md-4 mx-1 shadow">
            <img src="images/doctor.jpeg" style="width: 100%;" alt="">

            <h5 class="text-center">We are employing for doctors</h5>

            <a href="apply.php">
              <button class="btn btn-success my-3" style="margin-left: 30%;">Apply Now!!</button>
            </a>

          </div>
        </div>

      </div>

    </div>
  </body>
</html>

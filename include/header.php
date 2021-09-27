<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style media="screen">
    .navbar-custom{
        background-color: black;
    }
    </style>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-info navbar-custom">
      <h5 class="text-white">Hospital Management System</h5>

      <div class="mr-auto"></div>

      <ul class="navbar-nav d-lg-flex align-items-center">

        <?php
          if(isset($_SESSION['admin'])){
            $user = $_SESSION['admin'];
            echo '
            <li class="nav-item h-100"><a href="#" class="nav-link text-white">' .$user. '</a></li>
            <li class="nav-item h-100"><a href="logout.php" class="nav-link text-white">Log Out</a></li>';
          }else if(isset($_SESSION['doctor'])){
            $user = $_SESSION['doctor'];
            echo '
            <li class="nav-item h-100"><a href="#" class="nav-link text-white">' .$user. '</a></li>
            <li class="nav-item h-100"><a href="logout.php" class="nav-link text-white">Log Out</a></li>';
          }else if(isset($_SESSION['patient'])){
            $user = $_SESSION['patient'];
            echo '
            <li class="nav-item h-100"><a href="#" class="nav-link text-white">' .$user. '</a></li>
            <li class="nav-item h-100"><a href="logout.php" class="nav-link text-white">Log Out</a></li>';
          }else{
            echo '
            <li class="nav-item h-100"><a href="index.php" class="nav-link text-white">Home</a></li>
            <li class="nav-item h-100"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
            <li class="nav-item h-100"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
            <li class="nav-item h-100"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>';
          }
         ?>

      </ul>

    </nav>

  </body>
</html>

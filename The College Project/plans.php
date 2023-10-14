<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Import The FontAwesome Fill -->
  <link rel="stylesheet" href="Css/all.min.css">
  <!-- Import The FramWork File -->
  <link rel="stylesheet" href="Css/framworke.css">
  <!-- Imort The Normliz File -->
  <link rel="stylesheet" href="Css/Normliz.css">
  <!-- Import  The Main Style File -->
  <link rel="stylesheet" href="Css/main.css">
  <title>The College Project</title>
</head>

<body>
  <?php
    include("main.php");
    $fname = "";
    $lname = "";
    $plan = "";
    $username = "";
    while($row = mysqli_fetch_array($student_result)){
      if($row["active"] == "true"){
        $fname = $row["fname"];
        $lname = $row["lname"];
        $plan = $row["plan"];
        $username = $row["username"];
      }
    }
    if(isset($_POST["free-join"])){
      $plan = "free";
      $sqls = "UPDATE `accounts` SET `plan` = '$plan' WHERE `username` = '$username'";
      // echo $sqls;
      mysqli_query($con,$sqls);
      header("Location: plans.php");
      exit();
    }
    if(isset($_POST["preimum-join"])){
      $plan = "preimum";
      $sqls = "UPDATE `accounts` SET `plan` = '$plan' WHERE `username` = '$username'";
      // echo $sqls;
      mysqli_query($con,$sqls);
      header("Location: plans.php");
      exit();
    }
  ?>
  <div class="pre-loader"></div>
  <div class="page d-flex">
    <!-- Start Sidebar -->
    <div class="sidebar bg-white p-20 p-relative">
      <div class="side-container">
        <h3 class=" mt-0 p-relative text-c title">Project</h3>
        <ul>
          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="dashboard.php">
              <i class="fa-regular fa-fw fa-chart-bar"></i>
              <span class="d-none fs-14 ml-10">DashBord</span>
            </a>
          </li>
          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="settings.php">
              <i class="fa-solid fa-fw fa-gear"></i>
              <span class="d-none fs-14 ml-10">Settings</span>
            </a>
          </li>
          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="profile.php">
              <i class="fa-regular fa-fw fa-user"></i>
              <span class=" d-none fs-14 ml-10">Profile</span>
            </a>
          </li>
          <li>
            <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="courses.php">
              <i class="fa-solid fa-fw fa-graduation-cap"></i>
              <span class="d-none fs-14 ml-10">Courses</span>
            </a>
          </li>
          <li>
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="plans.php">
              <i class="fa-regular fa-fw fa-credit-card"></i>
              <span class=" d-none fs-14 ml-10">Plans</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="logout">
        <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="index.php">
          <i class="fa fa-fw fa-sign-out"></i>
          <span class="d-none fs-14 ml-10">logout</span>
        </a>
      </div>
    </div>
    <!-- End Sidebar -->
    <!-- Start Content -->
    <div class="content w-100">
      <!-- Start Head -->
      <!-- <div class="head between-flex bg-white p-10 p-relative">
        <div class="search prelative">
          <input class="text" type="search" placeholder="Type A keyword">
        </div>
        <div class="icons d-flex align-center">
          <span class="p-relative notification">
            <i class="fa-regular fa-bell fa-lg"></i>
          </span>
          <img src="Images/avatar.jpg" alt="">
        </div>
      </div> -->
      <!-- End Head -->
      <h1 class="main-heading p-relative">Plans</h1>
      <div class="plans-page d-grid gap-20 m-20">
        <div class="plan bg-white green rad-6 p-20">
          <div class="top bg-green text-c rad-6">
            <h2 class="c-white m-0">Free</h2>
            <div class="price c-white"><span>$</span> 0.00</div>
          </div>
          <ul class="m-0">
            <li>
              <i class="fa-solid fa-check fa-fw yes"></i>
              <span>Access All Text Lessons</span>
              <i class="fa-solid fa-circle-info help"></i>
            </li>
            <li>
              <i class="fa-solid fa-check fa-fw yes"></i>
              <span>Access All Text Lessons</span>
              <i class="fa-solid fa-circle-info help"></i>
            </li>
            <li>
              <i class="fa-solid fa-check fa-fw yes"></i>
              <span>Access All Text Lessons</span>
              <i class="fa-solid fa-circle-info help"></i>
            </li>
            <li>
              <i class="fa-solid fa-check fa-fw yes"></i>
              <span>Access All Text Lessons</span>
              <i class="fa-solid fa-circle-info help"></i>
            </li>
            <li>
              <i class="fa-solid fa-check fa-fw yes"></i>
              <span>Access All Text Lessons</span>
              <i class="fa-solid fa-circle-info help"></i>
            </li>
          </ul>
          <form action="" method="POST">
            <?php
              if($plan == "free"):
            ?>
            <p class="c-gray fs-14 w-full text-c mt-15">This Is Your Current Plan</p>
            <?php
              endif;
              if($plan == "preimum"):
            ?>
            <button class="main-btn join bg-green c-white w-fit b-none" name = "free-join" >Join</butt>
            <?php endif; ?>
          </form>
        </div>
        <div class="plan bg-white blue rad-6 p-20">
          <div class="top bg-blue text-c rad-6">
            <h2 class="c-white m-0">Premium</h2>
            <div class="price c-white"><span>$</span> 0.00</div>
          </div>
          <ul class="m-0">
            <li>
              <i class="fa-solid fa-check fa-fw yes"></i>
              <span>Access All Text Lessons</span>
              <i class="fa-solid fa-circle-info help"></i>
            </li>
            <li>
              <i class="fa-solid fa-check fa-fw yes"></i>
              <span>Access All Text Lessons</span>
              <i class="fa-solid fa-circle-info help"></i>
            </li>
            <li>
              <i class="fa-solid fa-check fa-fw yes"></i>
              <span>Access All Text Lessons</span>
              <i class="fa-solid fa-circle-info help"></i>
            </li>
            <li>
              <i class="fa-solid fa-check fa-fw yes"></i>
              <span>Access All Text Lessons</span>
              <i class="fa-solid fa-circle-info help"></i>
            </li>
            <li>
              <i class="fa-solid fa-check fa-fw yes"></i>
              <span>Access All Text Lessons</span>
              <i class="fa-solid fa-circle-info help"></i>
            </li>
          </ul>
          <form action="" method="POST">
            <?php
              if($plan == "preimum"):
            ?>
            <p class="c-gray fs-14 w-full text-c mt-15">This Is Your Current Plan</p>
            <?php
              endif;
              if($plan == "free"):
            ?>
            <button class="main-btn join bg-blue c-white w-fit b-none" name = "preimum-join">Join</button>
            <?php endif; ?>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
  <script src="JS/main.js"></script>
</body>

</html>

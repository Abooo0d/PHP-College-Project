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
    $email = "";
    $twitter = "";
    $facebook = "";
    $linkedin = "";
    $pass_fields_error = false;
    $old_pass_notmatch = false;
    $new_pass_notmatch = false;
    $info_fields_error = false;
    $old_pass_notmatch = false;
    $new_pass_notmatch = false;
    while($row = mysqli_fetch_array($student_result)){
      if($row["active"] == "true"){
        $username = $row["username"];
        $password = $row["password"];
        $courses = $row["courses-count"];
        $plan = $row["plan"];
        $img = $row["profile-image"];
        $email = $row["email-address"];
        $fname = $row["fname"];
        $lname = $row["lname"];
        $twitter = $row["twitter"];
        $facebook = $row["facebook"];
        $linkedin = $row["linkedin"];
      }
    }
    if(isset($_POST["change"])){
      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $email = $_POST["email"];
      if($fname == "" || $lname == "" || $email == "" ){
        $info_fields_error = true;
        return;
      } else {
        $sqls = "UPDATE `accounts` SET `fname` = '$fname', `lname` = '$lname', `email-address` = '$email' where `username` = '$username' ";
        mysqli_query($con,$sqls);
        header("Location: settings.php");
        exit();
      }
    }
    $oldpassword = "";
    $newpassword = "";
    $repeat = "";
    if(isset($_POST["change-password"])){
      $oldpassword = $_POST["oldpassword"];
      $newpassword = $_POST["newpassword"];
      $repeat = $_POST["repeat"];
      if($oldpassword == "" || $newpassword == "" || $repeat == ""){
        $pass_fields_error = TRUE;
        return;
      }else{
        if($oldpassword == $password){
          if($newpassword == $repeat){
            $sqls = "UPDATE `accounts` SET `password` = '$newpassword' WHERE `username` = '$username'";
            mysqli_query($con,$sqls);
            header("LocationL: settings.php");
            exit();
          }else{
            $new_pass_notmatch = true;
            return;
          }
        }else{
          $old_pass_notmatch = true;
          return;
        }
      }
    }
    if(isset($_POST["change-accounts"])){
      $facebook = $_POST["facebook"];
      $linkedin = $_POST["linkedin"];
      $twitter = $_POST["twitter"];
      $sqls = "UPDATE `accounts` SET `facebook` = '$facebook' , `linkedin` = '$linkedin' , `twitter` = '$twitter' WHERE `username` = '$username'";
      mysqli_query($con,$sqls);
      header("Location: settings.php");
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
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="settings.php">
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
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="courses.php">
              <i class="fa-solid fa-fw fa-graduation-cap"></i>
              <span class="d-none fs-14 ml-10">Courses</span>
            </a>
          </li>
          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="plans.php">
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
      <h1 class="main-heading p-relative">Settings</h1>
      <div class="setting-page m-20 d-grid gap-20">
        <!-- Start Setting Boxs -->
        <!-- Start General Info Widget -->
        <div class="p-20 rad-6 bg-white wedgit">
          <h2 class="mt-0 mb-0">General Info</h2>
          <p class="mt-5 mb-10 fs-14 c-gray">
            General Informatio About Your Account
          </p>
          <form action="" method = "POST">
            <label class="fs-15 c-gray mb-5 d-block">First Name</label>
            <input class="b-ccc w-100 mb-20 mt-5 p-5 rad-6 fs-18" type="text" placeholder="First Name" name = "fname" value = "<?php echo $fname;?>">
            <label class="fs-15 c-gray mb-5 d-block">Last Name</label>
            <input class="b-ccc w-100 mb-20 mt-5  p-5 rad-6 fs-18" type="text" placeholder="Last Name" name = "lname" value = "<?php echo $lname;?>">
            <label class="fs-15 c-gray mb-5 d-block">Email</label>
            <input class="b-ccc w-100 p-5 rad-6 fs-18 mb-10" type="email" placeholder="Email" name = "email" value = "<?php  echo $email;?>">
            <button class = "main-btn c-white bg-blue b-none m-auto d-block" name = "change"> Change</button>
            <label name = "error" class = "fs-13 c-blue d-block pl-10 mt-5" >
              <?php
              echo $info_fields_error ? "Plese Fill All The Fileds And Try Again" : "" ;
              ?>
            </label>
          </form>
        </div>
        <!-- End General Info Widget -->
        <!-- Start Security Info Wedgit -->
        <div class="secutity-info rad-6 bg-white p-20 wedgit">
          <h2 class="mt-0 mb-0">Security Info</h2>
          <p class="-mb-20 mt-5 fs-15 c-gray">
            Security Information About Your Account
          </p>
          <form action="" method = "POST">
            <div class="con p-relative">
              <label class="fs-15 c-gray mb-5 d-block">Old Pasword</label>
              <input class="b-ccc w-100 mb-15 mt-5 p-5 rad-6 fs-18 old-pass" type="password" name = "oldpassword" placeholder = "Old Password">
              <span class="show-pass old hide main-btn bg-blue c-white" onclick = "showPassword(settingOldPassShow,settingOldPass)">Show</span>
            </div>
            <div class="con p-relative">
              <label class="fs-15 c-gray mb-5 d-block">New Password</label>
              <input class="b-ccc w-100 mb-15 mt-5  p-5 rad-6 fs-18 new-pass" type="password" name = "newpassword" placeholder = "New Password">
              <span class="show-pass new hide main-btn bg-blue c-white" onclick = "showPassword(settingNewPassShow,settingNewPass)">Show</span>
            </div>
            <div class="con p-relative">
              <label class="fs-15 c-gray mb-5 d-block">Repeat Your Password</label>
              <input class="b-ccc w-100 p-5 mb-10 mt-5 rad-6 fs-18 repeat repeat-pass " type="password" name = "repeat" placeholder = "Repeat Your Password">
              <span class="show-pass repeat hide main-btn bg-blue c-white" onclick = "showPassword(settingRepeatPassShow,settingRepeatPass)">Show</span>
            </div>
            <button class = "main-btn c-white bg-blue b-none m-auto d-block" name = "change-password"> Change</button>
            <label name = "error" class = "fs-13 c-blue d-block pl-10 mt-5" >
              <?php
                echo $pass_fields_error ? "Please Fill All The Fields Ad Try Again" : "" ;
                echo $old_pass_notmatch ? "The Old Password Isn't Currect" : "" ;
                echo $new_pass_notmatch ? "The Repeat Isn't Currect" : "" ;
              ?>
            </label>
          </form>
        </div>
        <!-- End Security Info Wedgit -->
        <!-- Start Social Wedgit -->
        <div class="social p-15 bg-white rad-6 wedgit">
          <h2 class="mb-0 mt-0">Social Accounts</h2>
          <p class="mt-5 mb-20 fs-15 c-gray">
            Social Media Information
          </p>
          <form action="" method = "POST">
            <div class="account d-flex align-center mb-25">
              <i class="fab fa-twitter c-gray"></i>
              <input class="w-100 pl-10  c-blue" type="text" placeholder="Twitter Username" name = "twitter" value = "<?php echo $twitter;?>">
            </div>
            <div class="account d-flex align-center mb-25">
              <i class="fab fa-linkedin c-gray"></i>
              <input class="w-100 pl-10 " type="text" placeholder="Linkedin Username" name = "linkedin" value = "<?php echo $linkedin;?>">
            </div>
            <div class="account d-flex align-center mt-25 mb-20">
              <i class="fab fa-facebook c-gray"></i>
              <input class="w-100 pl-10 " type="text" placeholder="Facebook Username" name = "facebook" value = "<?php echo $facebook; ?>">
            </div>
            <button class = "main-btn c-white bg-blue b-none m-auto d-block" name = "change-accounts"> Change</button>
          </form>
        </div>
        <!-- End Social Wedgit -->
        <!-- End Setting Boxs -->
      </div>
    </div>
    <!-- End Content -->
  </div>
  <script src="JS/main.js"></script>
</body>

</html>

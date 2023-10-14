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
    $username = "";
    $email = "";
    $profile_img = "";
    $facebook = "";
    $Linkedin = "";
    $twitter = "";
    $courses = "";
    $plan = "";
    $posts = "";
    while($row = mysqli_fetch_array($student_result)){
      if($row["active"] == "true"){
        $fname = $row["fname"];
        $lname = $row["lname"];
        $username = $row["username"];
        $email = $row["email-address"];
        $profile_img = $row["profile-image"];
        $facebook = $row["facebook"];
        $linkedin = $row["linkedin"];
        $twitter = $row["twitter"];
        $courses = $row["courses-count"];
        $plan = $row["plan"];
      }
    }
    $sqls = "SELECT COUNT(*) FROM `Posts` WHERE `post-ouner` = '$username'";
    $my_posts0 = mysqli_query($con,$sqls);
    $my_posts_count = mysqli_fetch_array($my_posts0)[0];
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
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="profile.php">
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
      <h1 class="main-heading p-relative">Profile</h1>
      <div class="profile-page m-20">
        <div class="overview-container d-flex gap-20 w-100 mb-20">
          <!-- Start Overview Wedgit -->
          <div class="overview bg-white p-20 rad-6 d-flex align-center">
            <div class="avatar-box text-c">
              <img class="rad-50" src="Profile Images/<?php echo $profile_img; ?>" alt="">
              <h3 class="m-0 mt-10"><?php echo $username; ?></h3>
            </div>
            <div class="info-box w-fit">
              <div class="box p-20 d-flex align-center w-100 text-c-mobile">
                <h4 class="w-100 c-gray fw-normal fs-15 m-0">Personal Information</h4>
                <div>
                  <span class="c-gray">First Name: </span>
                  <span><?php echo $fname; ?></span>
                </div>
                <div>
                  <span class="c-gray">Last Name: </span>
                  <span><?php echo $lname; ?></span>
                </div>
                <div>
                  <span class="c-gray">Email Address:</span>
                  <span><?php echo $email ?> </span>
                </div>
              </div>
              <div class="box p-20 d-flex align-center w-100 text-c-mobile">
                <h4 class="w-100 c-gray fw-normal fs-15 m-0">General Information</h4>
                <div>
                  <span class="c-gray">Posts: </span>
                  <span><?php echo $my_posts_count ?></span>
                </div>
                <div>
                  <span class="c-gray">Plan: </span>
                  <span><?php echo $plan; ?></span>
                </div>
              </div>
            </div>
          </div>
          <!-- End Overview Wedgit -->
          <!-- Start Social Wedgit -->
          <div class="social-accounts p-20 bg-white rad-6 wedgit">
                <h2 class="mb-20 mt-0">Social</h2>
                <div class="box twitter p-15 mb-10 between-flex p-relative">
                  <i class="fa-brands fa-twitter c-white fa-2x h-100 center-flex"></i>
                  <span><?php echo $twitter; ?></span>
                </div>
                <div class="box facebook p-15 mb-10 between-flex p-relative">
                  <i class="fa-brands fa-facebook c-white fa-2x h-100 center-flex"></i>
                  <span><?php echo $facebook; ?></span>
                </div>
                <div class="box linkedin p-15 mb-10 between-flex p-relative">
                  <i class="fa-brands fa-linkedin c-white fa-2x h-100 center-flex"></i>
                  <span><?php echo $linkedin; ?></span>
                </div>
          </div>
          <!-- End Social Wedgit-->
        </div>
        <!-- Start Others Wedgit -->
        <div class="others d-flex gap-20">
          <!-- Start Skills Wedgit -->
        <!-- Start Lstest News Wedgit -->
        <div class="latest-news bg-white p-20 rad-6 wedgit">
          <h2 class="mt-0 mb-10">Latest Added Courses</h2>
          <div class="d-flex align-center f-wrap">
          <?php
          while($current_user = mysqli_fetch_array($student_courses_result)):
            if($current_user["username"] == $username):
          ?>
          <div class="box bb-ccc pt-5 pb-10 mb-20 d-flex w-100 text-c-mobile">
            <img class="rad-6" src="Courses Images/<?php echo $current_user["course-image"];?>" alt="">
            <div class="info ml-10">
              <h3 class="mb-0"><?php echo $current_user["course-name"]; ?></h3>
              <p class="c-gray fs-14 mt-10"><?php echo $current_user["course-teacher"]; ?></p>
            </div>
            <span class=" label d-block fs-13 h-fit main-btn text-c"><?php echo $current_user["lessons-count"] . " Lessons"; ?></span>
          </div>
          <?php
            endif;
          endwhile;
          ?>
          </div>
        </div>
          <!-- <div class="skills p-20 bg-white rad-6 wedgit w-fit">
            <h2 class="mt-0 mb-0">Skills</h2>
            <p class="mt-5 mb-20 c-gray fs-15">Complete Skills List</p>
            <ul class="m-0 text-c-mobile">
              <li><span>HTML</span><span>Pugjs</span><span>HAML</span></li>
              <li><span>CSS</span><span>SASS</span><span>Stylus</span></li>
              <li><span>JaveScript</span><span>TypeScript</span></li>
              <li><span>Veujs</span><span>Reactjs</span></li>
              <li><span>Jest</span><span>Jestmine</span></li>
              <li><span>PHP</span><span>Lerevel</span></li>
              <li><span>Python</span><span>Django</span></li>
            </ul>
          </div> -->
          <!-- End Skills Wedgit -->
          <!-- Start Latest Activites Wedgit -->
          <div class="last-post my-posts p-20 bg-white rad-6 wedgit ">
            <h2 class="mb-20 mt-0">Last Post</h2>
            <?php
            while($post_row = mysqli_fetch_array($post_result)):
              if($post_row["post-ouner"] == $username):
            ?>
            <div class="post-container">
              <div class="info d-flex align-center pb-15">
                <img class="mr-15" src="Profile Images/<?php echo $post_row["profile-image"]; ?>" alt="">
                <div class="text ">
                  <h4 class="mt-0 mb-0"><?php echo $post_row["post-ouner"];?></h4>
                  <p class="c-gray fs-14 mt-5 mb-0"><?php echo $row["profile-image"];?></p>
                </div>
              </div>
              <div class="post pt-20 c-gray text-c-modile">
                <?php echo $post_row["post"]; ?>
              </div>
              <div class="social between-flex c-gray pt-20">
                <div>
                  <i class="fa-regular fa-heart heart"></i>
                  <span><?php echo $post_row["post-likes"];?></span>
                </div>
                <div>
                  <i class="fa-regular fa-comment comment"></i>
                  <span>500</span>
                </div>
              </div>
            </div>
            <?php
                endif;
              endwhile;
              ?>
          </div>
          <!-- End Latest Activites Wedgit -->
        </div>
        <!-- End Others Wedgit -->
      </div>
    </div>
    <!-- End Content -->
  </div>
  <script src="JS/main.js"></script>
</body>

</html>

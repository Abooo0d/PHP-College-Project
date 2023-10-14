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
    $username = "";
    $fname = "";
    $password = "";
    $courses = "";
    $plan = "";
    $img = "";
    $student_count = "";
    while($row = mysqli_fetch_array($student_result)){
      if($row["active"] == "true"){
        $username = $row["username"];
        $fname = $row["fname"];
        $password = $row["password"];
        $courses = $row["courses-count"];
        $plan = $row["plan"];
        $img = $row["profile-image"];
      }
    }
    $student_count0 = mysqli_query($con,"SELECT COUNT(*) FROM `Accounts`");
    $student_count = mysqli_fetch_array($student_count0)[0];
    $teacher_count0 = mysqli_query($con,"SELECT COUNT(*) FROM `Teacher`");
    $teacher_count = mysqli_fetch_array($teacher_count0)[0];
    $posts_count0 = mysqli_query($con,"SELECT COUNT(*) FROM `Posts`");
    $posts_count = mysqli_fetch_array($posts_count0)[0];
    $courses_count0 = mysqli_query($con,"SELECT COUNT(*) FROM `Courses`");
    $courses_count = mysqli_fetch_array($courses_count0)[0];
    if(isset($_POST["post-send"])){
      $posttitle = "";
      $post = "";
      if(isset($_POST["post-title"])){
        $posttitle = $_POST["post-title"];
      }
      if(isset($_POST["post"])){
        $post = $_POST["post"];
      }
      $sqls = "INSERT INTO `posts`(`ID`, `post-ouner`, `post-title`, `post`, `post-likes`,`profile-image`) VALUES ($posts_count,'$username','$posttitle','$post',1,'$img')";
                                  // echo "$sqls";
      mysqli_query($con,$sqls);
      header("Location: dashboard.php");
      // exit();
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
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="dashboard.php">
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
      <h1 class="main-heading p-relative">DashBoarde</h1>
      <!-- Start Wrapper -->
      <div class="wrapper d-grid gap-20">
        <!-- Start Welcome Wedgit -->
        <div class="welcome bg-white rad-6 text-c-mobile d-block-mobile wedgit">
          <div class="intro p-20 d-flex space-between bg-eee ">
            <div>
              <h2 class="m-0">Welcome</h2>
              <p class="c-gray mt-5"><?php echo $fname;?></p>
            </div>
            <img class="d-none" src="Images/welcome.png" alt="">
          </div>
          <img src="Profile Images/<?php echo $img; ?>" class="avatar" alt="">
          <div class="body text-c p-20 d-flex mb-20 d-block-mobile">
            <div><?php echo $username;?> <span class="d-block fs-14 mt-10 c-gray">Developer</span></div>
            <div ><?php echo $plan; ?><span class="d-block fs-14 mt-10 c-gray">Plan</span></div>
            <div><?php echo $courses; ?><span class="d-block fs-14 mt-10 c-gray">Courses</span></div>
          </div>
          <a href="profile.html" class="visit d-block main-btn bg-blue w-fit c-white">Profile</a>
        </div>
        <!-- End Welcome Wedgit -->
        <!-- Start Tickets Wedgit -->
        <div class="tickets bg-white rad-6 p-10 pl-20 pr-20 wedgit">
          <h2 class="mt-0 mb-0">Web Site Staistics</h2>
          <p class="c-gray mt-5 mb-10 fs-14">Every Thing About Keep Learning</p>
          <div class="d-flex f-wrap text-c gap-20">
            <div class="box p-15 text-c rad-10 fs-14 c-gray b-ccc">
              <i class="fa-solid fa-fw fa-graduation-cap fa-2x c-blue pb-10"></i>
              <span class="d-block c-black fw-bold fs-25 mb-5"><?php echo $courses_count; ?></span>Courses
            </div>
            <div class="box p-15 text-c rad-10 fs-14 c-gray b-ccc">
              <i class="fa-regular fa-circle-user fa-2x c-green pb-10"></i>
              <span class="d-block c-black fw-bold fs-25 mb-5"><?php echo $student_count;?></span>student
            </div>
            <div class="box p-15 text-c rad-10 fs-14 c-gray b-ccc">
              <i class="fa-regular fa-user fa-2x c-orange pb-10"></i>
              <span class="d-block c-black fw-bold fs-25 mb-5"><?php echo $teacher_count; ?></span>Teacher
            </div>
            <div class="box p-15 text-c rad-10 fs-14 c-gray b-ccc">
              <i class="fa-regular fa-chart-bar fa-2x c-red pb-10"></i>
              <span class="d-block c-black fw-bold fs-25 mb-5"><?php echo $posts_count; ?></span>Post
            </div>
          </div>
        </div>
        <!-- End Tickets Wedgit -->
        <!-- Start Quick Draft Wedgit -->
        <div class="quick-draft p-20 bg-white rad-6">
          <h2 class="m-0">Quick Post</h2>
          <p class="c-gray fs-14 mt-5">Write A Post For Your Ideas</p>
          <form action="" method = "POST">
            <input type="text" class="text bg-eee w-100 b-none rad-6 p-10" placeholder="Title" name = "post-title">
            <textarea class="p-10 bg-eee rad-6 mb-10 w-100 b-none mt-20" placeholder="Write Your Draft" name = "post"></textarea>
            <input class="bg-blue c-white b-none main-btn" type="submit" value="Send" name = "post-send">
          </form>
        </div>
        <!-- End Quick Draft Wedgit -->
        <!-- Start Years Targets Wedgit -->
        <div class="years-target p-20 bg-white rad-6">
          <h2 class="m-0">Years Targets</h2>
          <p class="c-gray fs-14 mt-5 mb-10">Targets Of The Year</p>
          <div class="box  blue center-flex mb-20">
            <div class="icon center-flex blue">
              <i class="fa-solid fa-graduation-cap fa-lg c-blue"></i>
            </div>
            <div class="details">
              <span class="fs-14 c-gray ml-5">Courses</span>
              <span class="d-block mt-5 mb-10 fw-bold ml-5">20</span>
              <div class="progress p-relative blue">
                <span style="width:<?php echo $courses_count * 100 / 20;?>%" class="bg-blue">
                  <span class="bg-blue"><?php echo $courses_count * 100 / 20 . "%";?></span>
                </span>
              </div>
            </div>
          </div>
          <div class="box  green center-flex mb-20">
            <div class="icon center-flex green">
              <i class="fa-regular fa-circle-user c-green fa-lg"></i>
            </div>
            <div class="details">
              <span class="fs-14 c-gray ml-5">Students</span>
              <span class="d-block mt-5 mb-10 fw-bold ml-5">50</span>
              <div class="progress p-relative green">
                <span style="width:<?php echo $student_count * 100 / 50;?>%" class="bg-green">
                  <span class="bg-green text-c"><?php echo $student_count * 100 / 50 . "%";?></span>
                </span>
              </div>
            </div>
          </div>
          <div class="box orange center-flex mb-20">
            <div class="icon center-flex orange">
              <i class=" fa-regular fa-user fa-lg c-orange"></i>
            </div>
            <div class="details">
              <span class="fs-14 c-gray ml-5">Teachers</span>
              <span class="d-block mt-5 mb-10 fw-bold ml-5">10</span>
              <div class="progress p-relative orange">
                <span style="width:<?php echo $teacher_count * 100 / 10;?>%" class="bg-orange">
                  <span class="bg-orange"><?php echo $teacher_count * 100 / 10 . "%";?></span>
                </span>
              </div>
            </div>
          </div>

        </div>
        <!-- End Years Targets Wedgit -->
        <!-- Start Lstest News Wedgit -->
        <div class="latest-news bg-white p-20 rad-6 wedgit">
          <h2 class="mt-0 mb-10">Latest Added Courses</h2>
          <div class="d-flex align-center f-wrap">
            <?php
              while($course_row = mysqli_fetch_array($course_result)):
                if($course_row["ID"] >= $courses_count - 2):
            ?>
            <div class="box bb-ccc pt-5 pb-10 mb-20 d-flex w-100 text-c-mobile">
              <img class="rad-6" src="Courses Images/<?php echo $course_row["course-image"];?>" alt="">
              <div class="info ml-10">
                <h3 class="mb-0"><?php echo $course_row["course-name"]; ?></h3>
                <p class="c-gray fs-14 mt-10"><?php echo $course_row["course-teacher"]; ?></p>
              </div>
              <span class=" label d-block fs-13 h-fit main-btn text-c"><?php echo $course_row["lessons-count"] . " Lessons"; ?></span>
            </div>
            <?php
                endif;
              endwhile;
            ?>
          </div>
        </div>
        <!-- End Lstest News Wedgit -->
        <!-- Start Last post -->
        <div class="last-post p-20 bg-white rad-6 wedgit">
          <h2 class="mb-20 mt-0">Last Post</h2>
          <?php
          while($post_row = mysqli_fetch_array($post_result)):
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
            endwhile;
            ?>
        </div>
        <!-- End Last post Wedgit-->
      </div>
      <!-- End Wrapper -->
    </div>
    <!-- End Content -->
  </div>
  <script src="JS/main.js"></script>
</body>

</html>

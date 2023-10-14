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
    $ID = "";
    $course_name = "";
    $course_image = "";
    $course_teacher = "";
    $teacher_image = "";
    $lessons_count = "";
    $price = "";
    $lang = "";
    $lessons_count = "";
    $course_id = "";

    $username = "";
    $fname = "";
    $password = "";
    $courses = "";
    $plan = "";
    $img = "";
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
    if(isset($_POST["add"])){
      $ID = str_split($_POST["course-id"],1)[0];
      $sqls = "SELECT * FROM `courses` WHERE `ID` = $ID ";
      $my_course =mysqli_fetch_array( mysqli_query($con,$sqls));
      $course_id =mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) FROM `student-courses`"))[0];
      $course_name = $my_course["course-name"];
      $course_teacher = $my_course["course-teacher"];
      $teacher_image = $my_course["teacher-profile-image"];
      $course_image = $my_course["course-image"];
      $lessons_count = $my_course["lessons-count"];
      $sqls = "INSERT INTO `student-courses` (`ID`,`username`,`course-name`,`course-image`,`lessons-count`,`course-teacher`)
                            VALUES ($course_id,'$username','$course_name','$course_image','$lessons_count','$course_teacher')";
      mysqli_query($con,$sqls);
      header("Location: courses.php");
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
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="courses.php">
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
      <h1 class="main-heading p-relative">Courses</h1>
      <div class="courses-page d-grid gap-20 m-20">
        <?php
        while($row = mysqli_fetch_array($course_result)):
        ?>
        <div class="course rad-6 bg-white p-relative">
          <form action="" method = "POST">
            <img src="Courses Images/<?php echo $row["course-image"] ;?>" alt="" class="cover">
            <img src="Teacher Images/<?php echo $row["teacher-profile-image"]; ?>" alt="" class="instructre">
            <div class="p-20">
              <input type="text" class="course-id" name="course-id" id="" value = "<?php echo $row["ID"]."- " ?>">
              <h3 class="m-0 d-inline"><?php echo $row["course-name"]; ?></h3>
              <p class="fs-13 c-gray"> <?php echo $row["course-teacher"]; ?> </p>
            </div>
            <div class="info p-15 between-flex p-relative">
              <button class="info-btn bg-blue c-white main-btn info-btn b-none" name = "add">Add Course</button>
              <span class="c-gray fs-13">
                <i class="fa-regular fa-user"></i>
                <?php echo $row["lessons-count"]; ?>
              </span>
              <span class="c-gray" fs-13>
                <i class="fa-solid fa-dollar-sign"></i>
                <?php echo $row["price"] ;?>
              </span>
            </div>
          </form>
        </div>
        <?php endwhile;?>
      </div>
    </div>
  </div>
  <script src="JS/main.js"></script>
</body>

</html>


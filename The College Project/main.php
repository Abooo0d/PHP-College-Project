<?php
  // Start Connection
  $host = "localhost";
  $user = "root";
  $pass = "";
  $database = "Project_Database";
  $con = mysqli_connect($host,$user,$pass,$database);
  $mainusername = "";
  $mainpassword = "";
  $student_result = mysqli_query($con,"SELECT * FROM `Accounts`");
  $teacher_result = mysqli_query($con, "SELECT * FROM `Teacher`");
  $post_result = mysqli_query($con,"SELECT * FROM `Posts`");
  $course_result = mysqli_query($con,"SELECT * FROM `Courses`");
  $student_courses_result = mysqli_query($con,"SELECT * FROM `student-courses`");
  function CheckTheAccount($username, $password, $result) : bool {
    $mainusername = $username;
    $mainpassword = $password;
    while($row  = mysqli_fetch_array($result)){
      if($mainusername == $row["username"]){
        if($mainpassword == $row["password"]){
          return TRUE;
        }
      }
    }
    return FALSE;
  }
?>


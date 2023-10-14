<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Css/all.min.css">
  <link rel="stylesheet" href="Css/framworke.css">
  <link rel="stylesheet" href="Css/main.css">
  <link rel="stylesheet" href="Css/Normliz.css">
  <title>Sign-Up</title>
</head>

<body>
  <?php
  include("main.php");
  // Fields
  $fname = "";
  $lname = "";
  $username = "";
  $email = "";
  $password1 = "";
  $password2 = "";
  $fields_error = false;
  $pass_error = false;
  $sqls = "";
  if(isset($_POST["fname"])){
    $fname = $_POST["fname"];
  }
  if(isset($_POST["lname"])){
    $lname = $_POST["lname"];
  }
  if(isset($_POST["username"])){
    $username = $_POST["username"];
  }
  if(isset($_POST["email"])){
    $email = $_POST["email"];
  }
  if(isset($_POST["password1"])){
    $password1 = $_POST["password1"];
  }
  if(isset($_POST["password2"])){
    $password2 = $_POST["password2"];
  }
  if(isset($_POST["creat-account"])){
    $fields_error = false;
    $pass_error = false;
    if($fname != "" && $lname != "" && $username != "" && $email != "" && $password1 != ""){
      if($password1 === $password2){
        $sqls = "INSERT INTO `Accounts`(`fname`, `lname`, `username`, `email-address`, `password`,`courses`, `courses-count`, `plan`,`active`,`profile-image`,`twitter`,`facebook`,`linkedin`)
                                VALUES ('$fname','$lname','$username','$email','$password1','','0','free','false','','','','')";
        // echo $sqls;
        mysqli_query($con,$sqls);
        header("Location: index.php");
        Exit();
      }else{
        $pass_error = true;
      }
    }else{
      $fields_error = true;
    }
  }
  ?>
  <div class="pre-loader"></div>
  <div class="page center-flex">
    <div class="sign-up-form rad-6 bg-white">
      <h3 class="title w-fit ">Sign-Up</h3>
      <form method="POST">
        <div class="fields">
          <div class="con p-relative">
            <h3 class="fs-15 c-gray m-0">First Name: </h3>
            <input type="text" name="fname" class="c-blue fs-20 p-5 b-eee">
          </div>
          <div class="con p-relative">
            <h3 class="fs-15 c-gray m-0">last Name: </h3>
            <input type="text" name="lname" class="c-blue fs-20 p-5 b-eee">
          </div>
          <div class="con p-relative">
            <h3 class="fs-15 c-gray m-0">User Name:</h3>
            <input type="text" name="username" class="c-blue fs-20 p-5 b-eee">
          </div>
          <div class="con p-relative">
            <h3 class="fs-15 c-gray m-0">Email Address: </h3>
            <input type="text" name="email" class="c-blue fs-20 p-5 b-eee">
          </div>
          <div class="con p-relative">
            <h3 class="fs-15 c-gray m-0">Password: </h3>
            <input type="password" name="password1" class="c-blue fs-20 p-5 b-eee password">
            <span class="show-pass password hide main-btn bg-blue c-white" onclick="showPassword(signupPassShow,signupPasword)">Show</span>
          </div>
          <div class="con p-relative pb-10">
            <h3 class="fs-15 c-gray m-0">Repeat Your Password: </h3>
            <input type="password" name="password2" class="c-blue fs-20 p-5 b-eee mb-10 repeat">
            <span class="show-pass repeat hide main-btn bg-blue c-white" onclick="showPassword(signupRepeatPassShow,signupRepeatPassword)">Show</span>
          </div>
        </div>
        <div class="button-container center-flex w-100 gap-10">
          <button class="main-btn bg-blue c-white fs-20 b-none creat" name="creat-account">Creat Account</button>
        </div>
      </form>
      <label name = "error" class = "fs-13 c-red d-block pl-10">
      <?php
        if(isset($_POST["creat-account"])){
          echo $fields_error ? "Plese Fill All Fields And Try Again" : "";
          echo $pass_error ? "The Passwords Dosen't Match Please Try Again" : "";
        }
      ?>
      </label>
    </div>
  </div>
  <script src="JS/main.js"></script>
</body>
</html>

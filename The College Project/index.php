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
  <title>Login</title>
</head>

<body>
  <?php
  include("main.php");
  // Fields
  $username = "";
  $password = "";
  $error = false;
  if(isset($_POST["username"])){
    $username = $_POST["username"];
  }
  if(isset($_POST["password"])){
    $password = $_POST["password"];
  }
  if(isset($_POST["sign-up"])){
    header("Location: signup.php");
    Exit();
  }
  if(isset($_POST["login"])){
    $mainusername = $username;
    $mainpassword = $password;
    if(CheckTheAccount($mainusername, $mainpassword, $student_result)) {
      $sqls = "UPDATE `accounts` SET `active`= 'false'";
      mysqli_query($con,$sqls);
      $sqls = "UPDATE `accounts` SET `active`= 'true' WHERE `username` = '$username'";
      mysqli_query($con,$sqls);
      header("Location: dashboard.php");
      $error = FALSE;
      Exit();
    } else {
      $error = TRUE;
    }
  }
  ?>
  <div class="pre-loader"></div>
  <div class="page center-flex">
    <div class="login-form rad-6 bg-white">
      <h3 class="title w-fit ">Login</h3>
      <form method="POST">
        <div class="con p-relative">
          <h3 class="fs-15 c-gray m-0">User Name: </h3>
          <input type="text" name="username" class="c-blue fs-20 p-5 b-eee">
        </div>
        <div class="con p-relative">
          <h3 class="fs-15 c-gray m-0">Password: </h3>
          <input type="password" name="password" class="c-blue fs-20 p-5 b-eee password">
          <span class="show-pass old hide main-btn bg-blue c-white" onclick="showPassword(loginPassShow,loginPassword)">Show</span>
        </div>
        <div class="button-container">
          <button class="main-btn bg-blue c-white fs-20 b-none login" name="login">Login In</button>
          <button class="main-btn bg-green c-white fs-20 b-none sign-up" name="sign-up">Sign In</button>
        </div>
      </form>
      <label name = "error" class = "fs-13 c-red d-block pl-10"><?php echo $error?"The Username Or The Password Isn't Correct": "" ?></label>
    </div>
  </div>
  <script src="JS/main.js"></script>
</body>

</html>

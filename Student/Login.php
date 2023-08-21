<?php 
  session_start();
  if(isset($_SESSION['student_eno'])){
    header("location:Student_home.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form action = "login_user.php" method = "post">
      <input type="text" placeholder="Username" name = "username" required>
      <input type="password" placeholder="Enrollment Number" name = "enrollment" required>
      <button type="submit">Login</button>
    </form>

    <?php 
      if(isset($_REQUEST['status'])){
        ?>
        <p align = "center" class = "msg">Invalid username or enrollment number</p>
        <?php
      }
    ?>
  </div>
</body>
</html>

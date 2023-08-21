<?php 
  session_start();
  if(isset($_SESSION['uname'])){
    header("location:Admin_Teacher_home.php");
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
    <form action = "login_teacher_part2.php" method = "post">
      <input type="text" placeholder="Username" name = "username" required>
      <input type="number" placeholder="Faculty Id" name = "faculty" required>
      <button type="submit">Login</button>
    </form>

    <?php 
      if(isset($_REQUEST['status'])){
        ?>
        <p align = "center" class = "msg">Invalid username or Faculty Id</p>
        <?php
      }
    ?>
  </div>
</body>
</html>

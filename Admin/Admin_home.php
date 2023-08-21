<?php 
  session_start();
  if(!isset($_SESSION['uname'])){
    header("location:Login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href = "style_admin.css" rel = "stylesheet" type = "text/css">
</head>
<body>

<?php
include("validate_login.php"); 
  require_once("Navbar.php");

  $con = mysqli_connect("localhost","root","","admin");
  if($con){
    $query = "select * from student_info";
    $result = mysqli_query($con,$query);

    $students_num = mysqli_num_rows($result);

    $query2 = "select * from classroom_for_teacher";
    $result2 = mysqli_query($con,$query2);

    $classroom_num = mysqli_num_rows($result2);

    $query3 = "select * from teacher_info";
    $result3 = mysqli_query($con,$query3);

    $teacher_num = mysqli_num_rows($result3);
  }
?>

<h1 class = "heading mt-2">Dashboard</h1>
<div class = "main">
<a href = "View_all_students.php" style = "text-decoration:none;margin-left:10%;">
<div class = "cont">
  <img src = "images/graduated.png" class = "stud_icon">
  <div class = "box">
    <p class = "info num"><?php echo $students_num?></p>
    <p class = "info text">Total Students</p>
  </div>
</div>
</a>
<a href = "View_All_teacher.php" style = "text-decoration:none;margin-left:7%;">
<div class = "cont2">
  <img src = "images/teacher.png" class = "stud_icon">
  <div class = "box">
    <p class = "info num"><?php echo $teacher_num?></p>
    <p class = "info text">Total Teachers</p>
  </div>
</div>
</a>
<a href = "View_all_classroom.php" style = "text-decoration:none;margin-left:7%;">
<div class = "cont3">
  <img src = "images/online-course.png" class = "stud_icon">
  <div class = "box2">
    <p class = "info num"><?php echo $classroom_num;?></p>
    <p class = "info text">Total Classrooms</p>
  </div>
</div>
</a>
</div>
</body>
</html>
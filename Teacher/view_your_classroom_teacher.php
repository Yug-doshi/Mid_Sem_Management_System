<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Classrooms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
    .main{
        display:flex;
    }
    .classroom{
        width:300px;
        height:300px;
        /* background-color: red; */
        border:1px solid black;
        border-radius:10px;
        color:white;
    }
    .teacher_img{
        display:inline-block;
        /* background-color:red; */
        height:100px;
        width:80px;
        margin-top:10px; 
        margin-left:90px;
        border-radius:50px;
    }
    </style>
</head>
<?php 
session_start();
include('validate_login.php');
$faculty=$_SESSION['Teacher_Id'];
require_once("Navbar.php");
$con = mysqli_connect("localhost","root","","admin");
if(isset($_REQUEST['name'])){
            $name = $_GET['name'];
            $query = "select * from classroom_for_teacher where Teacher_Id='$faculty' and Class_Name like '$name%'";
            $result = mysqli_query($con,$query);
        }
    else
    {
    $result = mysqli_query($con,"select * from classroom_for_teacher where Teacher_Id='$_SESSION[Teacher_Id]'");
    }
?>

<body>


<h1 align = "center" class = "total text-success mt-3">Total Classrooms: <?php echo mysqli_num_rows($result);?></h1> <hr>
    <form action = "view_your_classroom_teacher.php" align = "center">
        <input type = "text" placeholder = "Enter name of Classroom to search:" name = "name" class = " form-control w-25 border border-dark mt-4 mb-4" style = "margin-left:38vw;text-align:center;">
        <input type = "submit" value = "Search" class = "btn btn-success">
    </form>
<div class = "main">
    <?php 
        while($row = mysqli_fetch_array($result)){
            ?>
            <div class = "classroom ms-5 mt-5">
                <div class = "image" style = "background-image:url('<?php echo '../classroom_img/'.$row['Class_Cover_Image']?>');height:120px;color:white;padding-top:15px;border-radius:10px;">
       
                <a class = "ms-4 h3" href = "Class.php?Class_code=<?php echo $row['Class_code'] ?>"><?php echo $row['Class_Name']?></a>
 
                <div style = "display:flex">
                    <div class = "teacher_img" style = "background-image:url('');background-size:cover;background-repeat:no-repeat;"></div>
                </div>
                <p style = "color:grey;" class = "ms-3">Class code: <?php echo $row['Class_code'];?></p>
                <hr style = "color:black;">
                <a href = "Delete_classroom_teacher.php?class_code=<?php echo $row['Class_code'] ?>"><img src = "images/delete.png" height = "40" class = "ms-3 mt-3"></a>
                <a href = "update_classroom_teacher.php?class_code=<?php echo $row['Class_code'];?>"><img src = "images/refresh-page-option.png" height = "40" class = "ms-4 mt-3 icon"></a>
                </div>
            </div>
            <?php
        }
        mysqli_close($con);
    ?>

</div>
</body>
</html>
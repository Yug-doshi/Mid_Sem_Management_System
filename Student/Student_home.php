<?php 
    session_start();
    if(!isset($_SESSION['student_eno'])){
        header("location:Login.php");
    }

    $eno = $_SESSION['student_eno'];

    $con = mysqli_connect("localhost", 'root', "", "admin");
    $query = "select * from student_info where Enrollment = $eno";
    $result = mysqli_query($con, $query);
    $result = mysqli_fetch_array($result);

    $query2 = "select * from classroom_students where Enrollment = $eno";
    $result2 = mysqli_query($con, $query2);
    // $result2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <style>
        .div{
            height:35px;
            display:flex;
            justify-content:center;
        }
        .main{
        display:flex;
        flex-wrap:wrap;
        }
        .classroom{
            width:300px;
            height:280px;
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
<body>
    <?php include("Navbar.php"); ?>
    <div class = "div">
        <p class = "text-success h1 ms-3">Total Classrooms: <?php echo mysqli_num_rows($result2);?></p>
        <a href = "Join.php">
        <img src = "images/add.png" style = "position:absolute;right:0;height:30px;margin-top:10px;margin-right:30px;">
        </a>
    </div>
    <hr>
    <div class = "main">
    <?php 
    // echo "<pre>";
    // print_r($result2);
    // echo "</pre>";
    // // exit;
        while($row2 = mysqli_fetch_array($result2)){
            $classcode = $row2['Class_Code'];
            $query3 = "select * from classroom_for_teacher where Class_code = '$classcode' ";
            $result3 = mysqli_query($con,$query3);
            // print_r($result3);
            // exit;
            while($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
            ?>
            <div class = "classroom ms-5 mb-4 mt-3">
                <div class = "image" style = "background-image:url('<?php echo '../classroom_img/'.$row['Class_Cover_Image']?>');height:120px;color:white;padding-top:15px;border-radius:10px;">
       
                <a class = "ms-4 h3" href = "Class.php?Class_code=<?php echo $row['Class_code'] ?>"><?php echo $row['Class_Name']?></a>
 
                <div style = "display:flex">
                    <p class = "ms-2 mt-4"><?php echo $row['Teacher_Name']?></p>    
                </div>
                <p style = "color:grey;" class = "ms-3 mt-5">Class code: <?php echo $row['Class_code'];?></p>
                <hr style = "color:black;">
                </div> 
            </div>
            <?php
            }
        }
        mysqli_close($con);
    ?>

</div>
</body>
</html>
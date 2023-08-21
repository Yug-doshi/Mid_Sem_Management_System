<?php 
session_start();
include("validate_login.php");
    $Class_code = $_REQUEST['Class_code'];
    $con = mysqli_connect('localhost','root','','admin');

    if($con){
        $query = "select * from classroom_for_teacher where Class_code = '$Class_code'";
        $result = mysqli_query($con,$query);
        $result = mysqli_fetch_array($result);

        $query2 = "select * from classroom_students where Class_code = '$Class_code'";
        $result2 = mysqli_query($con,$query2);
        // print_r($result2);
        // echo $Class_code;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $result['Class_Name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("Classroom_nav.php"); ?>
    <div style = "text-align:center;width:50vw;margin-left:25vw;">
        <h2 style = "color:#0f9669;">Teachers</h2>
        <div style = "height:2px;background-color:#0f9669"></div>
        <div style = "display:flex;justify-content: center;">
            <div style = "">
            </div>
            <p class = "font-weight-bold ms-4 h4 mt-2"><?php echo $result['Teacher_Name']; ?></p>
        </div>

        <h2 style = "color:#0f9669;" class = "mt-5">Classmates</h2>
        <div style = "height:2px;background-color:#0f9669"></div>
        <?php 
            while($row = mysqli_fetch_array($result2)){
                $eno = $row['Enrollment'];
                $query3 = "select * from student_info where Enrollment = $eno";
                $result3 = mysqli_query($con,$query3);
                $result3 = mysqli_fetch_array($result3);

                $query4 = "select * from projects where Enrollment = $eno";
                $result4 = mysqli_query($con,$query4);
                $result4 = mysqli_fetch_array($result4);
                ?>
                <div style = "display:flex;justify-content:center;">
                <!-- <div style = "">
                    <img src = "../student_img/<?php echo $result3['Photo'];?>" style = "height:50px;border-radius:50%" class = "mt-3">
                </div> -->
                <p class = "font-weight-bold ms-4 h4 mt-4"><?php echo $result3['First_Name'].' '.$result3['Last_Name']; ?></p>

                <a href = "Download_Project.php?file=<?php echo $result4['File']?>">
                <img src = "../images/download.png" style = "height:30px;position:absolute;right:0;margin-right:27vw;" class = "mt-4">
                </a>

            </div>
                <hr>
            <?php
            }
        ?>
           
        </div>
</body>
</html>
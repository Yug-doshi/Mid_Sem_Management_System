<?php 
    session_start();
    // Establishing the connection with the database
    $hostname = "localhost";
    $uname = "root";
    $password = "";
    $database = "admin";
    $con = mysqli_connect($hostname, $uname, $password, $database);

    if($con){
        $username = $_POST["username"];
        $faculty = $_POST["faculty"];

        $query = "SELECT * FROM `teacher_info` WHERE Teacher_Name = '$username' and Teacher_Id = '$faculty'";
        $sql = mysqli_query($con, $query);

        if($sql){
            $count = mysqli_num_rows($sql);

            if($count == 0){
                header("location:login_teacher_part.php?status=fail");
            }
            else
            {
                $_SESSION['uname'] = $username;
                $_SESSION['Teacher_Id']= $faculty;
                header("location:view_your_classroom_teacher.php");
            }
        }
    }
    else{
        echo "Connection not established";
    }
?>
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
        $enrollment = $_POST["enrollment"];

        $query = "SELECT * FROM `student_info` WHERE First_Name = '$username' and Enrollment  = '$enrollment' ";

        $sql = mysqli_query($con, $query);

        if($sql){
            $count = mysqli_num_rows($sql);

            if($count == 0){
                header("location:Login.php?status=fail");
            }
            else{
                $_SESSION['student_eno'] = $enrollment;
                $_SESSION['student_name'] = $username;
                header("location:Student_home.php");
            }
        }
    }
    else{
        echo "Connection not established";
    }
?>
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
        $mypassword = $_POST["password"];

        $query = "SELECT * FROM `admin_info` WHERE username = '$username' and password = '$mypassword' ";

        $sql = mysqli_query($con, $query);

        if($sql){
            $count = mysqli_num_rows($sql);

            if($count == 0){
                header("location:Login.php?status=fail");
            }
            else{
                $_SESSION['uname'] = $username;
                header("location:Admin_home.php");
            }
        }
    }
    else{
        echo "Connection not established";
    }
?>
<?php 
session_start();
include('validate_login.php');
    $class_code =  $_REQUEST['class_code'];
    $con = mysqli_connect("localhost","root","","admin");

    $result = mysqli_query($con,"select * from classroom_for_teacher where Class_code = '$class_code'");
    $result = mysqli_fetch_array($result);

    $img = 'classroom_img/'.$result['Class_Coverimage'];

    if(file_exists($img)){
        unlink($img);
    }

    $query = "delete from classroom_for_teacher where Class_code = '$class_code' ";
    $query2 = "delete from classroom_students where Class_Code = '$classcode'";
    $sql = mysqli_query($con,$query);
    $sql2 = mysqli_query($con,$query2);

    if($sql){
        header("location:view_your_classroom_teacher.php");
    }
    mysqli_close($con);
?>
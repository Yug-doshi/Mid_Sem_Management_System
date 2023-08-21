<?php 
session_start();
include("validate_login.php");
    $classcode =  $_REQUEST['classcode'];
    $con = mysqli_connect("localhost","root","","admin");

    $result = mysqli_query($con,"select * from classroom_for_teacher where Class_code = '$classcode'");
    $result = mysqli_fetch_array($result);

    $img = 'classroom_img/'.$result['Class_Cover_Image'];

    if(file_exists($img)){
        unlink($img);
    }

    $query = "delete from classroom_for_teacher where Class_code = '$classcode' ";
    $query2 = "delete from classroom_students where Class_Code = '$classcode'";
    $sql = mysqli_query($con,$query);
    $sql2 = mysqli_query($con,$query2);

    if($sql){
        header("location:View_all_classroom.php");
    }
    mysqli_close($con);
?>
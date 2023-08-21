<?php 
session_start();
include("validate_login.php");
    $con = mysqli_connect("localhost","root","","admin");

    if($con){
        $eno = $_REQUEST['eno'];
        $query = "delete from student_info where Enrollment = $eno";

        try{
            $sql = mysqli_query($con,$query);
        }
        catch(Exception $e){
            echo "<pre>";
            print_r($e);
            echo "</pre>";
        }

        if($sql){
            header("location:View_all_students.php");
        }
        else{
            header("location:View_all_students.php?status=fail");
        }
    }    
?>
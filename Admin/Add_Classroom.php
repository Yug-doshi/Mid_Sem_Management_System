<?php 
session_start();
include("validate_login.php");
    $pattern = '/^[A-z ]+$/';
    $hostname = "localhost";
    $uname = "root";
    $password = "";
    $database = "admin";

    $con = mysqli_connect($hostname, $uname, $password, $database);
    
    $classcode = $_REQUEST['classcode'];
    $classname = $_POST['classname'];
    $teacher = $_REQUEST['teachername'];

    $img_name = $_FILES['coverimage']['name'];
    $img_size = $_FILES['coverimage']['size'];
    $img_tmp = $_FILES['coverimage']['tmp_name'];

    $pos = strpos($img_name,'.');
    $ext = substr($img_name,$pos+1,);
    $ext = strtolower($ext);
    $valid_ext = array('jpg','png','jpeg');
    $img_db = uniqid('cover-',true).'.'.$ext;

    $teacher_valid = 1;
    $img_valid = 1;

    if(!in_array($ext,$valid_ext)){
        $img_valid = 0;
        echo $img_valid;
    }

    // if(!preg_match($pattern,$teacher)){
    //     $teacher_valid = 0;
    // }

    if(!($teacher_valid and $img_valid)){
        header("location:Update_classroom.php?classname=$classname&classcode=$classcode&teacher=$teacher&teacher_valid=$teacher_valid&img_valid=$img_valid");
        die();
    }

    if($con){
        try{
            if(isset($_REQUEST['command'])){
                $query = "update classroom_for_teacher set Class_Name = '$classname', Teacher_Name = '$teacher', Class_Cover_Image = '$img_db'  where Class_code = '$classcode' ";
            }
            $sql = mysqli_query($con,$query);
            
            if($img_valid){
                $dest = '../classroom_img/'.$img_db;
                move_uploaded_file($img_tmp,$dest);
            }

            if($sql){
                if(isset($_REQUEST['command'])){
                    header("location:View_all_classroom.php");
                }
            }
            else{
                if(isset($_REQUEST['command'])){
                    header("location:Update_classroom.php?status=failure&classname=$classname&classcode=$classcode&teacher=$teacher&teacher_valid=$teacher_valid&img_valid=$img_valid");
                }
            }
        }
        catch(Exception $e){
            if(isset($_REQUEST['command'])){
                $msg = $e->getMessage();
                header("location:Update_classroom.php?status=duplicate&msg=$msg&classname=$classname&classcode=$classcode&teacher=$teacher&teacher_valid=$teacher_valid&img_valid=$img_valid");
            }
        }
    }
    else{
        header("location:Create_classroom.php?status=failure&classname=$classname&classcode=$classcode&teacher=$teacher&teacher_valid=$teacher_valid&img_valid=$img_valid");
    }
?>
<?php 
session_start();
include('validate_login.php');
    $pattern = '/^[A-z ]+$/';
    $hostname = "localhost";
    $uname = "root";
    $password = "";
    $database = "admin";

    $con = mysqli_connect($hostname, $uname, $password, $database);
    
    $classcode = $_REQUEST['classcode'];
    $classname = $_POST['classname'];
    $tname=$_SESSION['uname'];
    $faculty=$_SESSION['Teacher_Id'];

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

    if(!($img_valid)){
        header("location:Create_classroom_Teacher.php?classname=$classname&classcode=$classcode&teacher=$teacher&teacher_valid=$teacher_valid&img_valid=$img_valid");
        die();
    }

    if($con){
        try{
            if(isset($_REQUEST['command'])){
                $query = "update classroom_for_teacher set Class_Name = '$classname', Class_Coverimage = '$img_db' where classcode ='Class_code'$Class_code' ";
            }
            else{
                $query = "insert into classroom_for_teacher values('$faculty','$classname', '$classcode', '$tname', '$img_db')";
            }
            $sql = mysqli_query($con,$query);
            
            if($img_valid){
                $dest = '../classroom_img/'.$img_db;
                move_uploaded_file($img_tmp,$dest);
            }

            if($sql){
                if(isset($_REQUEST['command'])){
                    header("location:view_your_classroom_teacher.php");
                }
                else{
                    header("location:Create_classroom_Teacher.php?suc=success");
                }
            }
            else{
                if(isset($_REQUEST['command'])){
                    header("location:Update_classroom.php?status=failure&classname=$classname&classcode=$classcode&img_valid=$img_valid");
                }
                else{
                    header("location:Create_classroom.php?status=failure&classname=$classname&classcode=$classcode&&img_valid=$img_valid");
                }
            }
        }
        catch(Exception $e){
            if(isset($_REQUEST['command'])){
                $msg = $e->getMessage();
                header("location:Update_classroom.php?status=duplicate&msg=$msg&classname=$classname&classcode=$classcode&img_valid=$img_valid");
            }
            else{
                $msg = $e->getMessage();
                header("location:Create_classroom.php?status=duplicate&msg=$msg&classname=$classname&classcode=$classcode&img_valid=$img_valid");
            }
        }
    }
    else{
        header("location:Create_classroom.php?status=failure&classname=$classname&classcode=$classcode&img_valid=$img_valid");
    }
?>
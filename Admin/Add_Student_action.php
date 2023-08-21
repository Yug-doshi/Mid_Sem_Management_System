<?php
    session_start();
    include("validate_login.php");
    $pattern = '/^[A-z]+$/';
    $patter2 = '/^[0-9]{12}$/';
    $pattern3 = '/^[0-9]{10}$/';

    $hostname = "localhost";
    $uname = "root";
    $password = "";
    $database = "admin";

    $con = mysqli_connect($hostname, $uname, $password, $database);

    if($con){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        if(isset($_POST['update'])){
            $eno = $_POST['eno'];
        }
        else{
            $eno = $_POST['eno'];
        }
        $sem = $_POST['sem'];
        $mob = $_POST['mob'];
        $photo = $_FILES['photo'];
        $admin = $_POST['admin'];
        $branch = $_POST['branch'];

        $img_name = $_FILES['photo']['name'];
        $img_size = $_FILES['photo']['size'];
        $img_tmp = $_FILES['photo']['tmp_name'];

        $pos = strpos($img_name,'.');
        $ext = substr($img_name,$pos+1,);
        $ext = strtolower($ext);
        echo $ext;
        $valid_ext = array('jpg','png','jpeg');
        $img_db = $eno.'.'.$ext;

        $fname_valid = 1;
        $lname_valid = 1;
        $eno_valid = 1;
        $mob_valid = 1;
        $img_valid = 1;

        if(isset($_REQUEST['update'])){
            if(!preg_match($pattern,$fname)){
                $fname_valid = 0;
            }
            if(!preg_match($pattern,$lname)){
                $lname_valid = 0;
            }
            if(!preg_match($pattern3,$mob)){
                $mob_valid = 0;
            }
        }
        else{
            if(!preg_match($pattern,$fname)){
                $fname_valid = 0;
            }
            if(!preg_match($pattern,$lname)){
                $lname_valid = 0;
            }
            if(!preg_match($patter2,$eno)){
                $eno_valid = 0;
            }
            if(!preg_match($pattern3,$mob)){
                $mob_valid = 0;
            }
        }
        if(!in_array($ext,$valid_ext)){
            $img_valid = 0;
            exit;
        }

        if(!($fname_valid and $lname_valid and $eno_valid and $mob_valid and $img_valid)){
            header("location:Add_Student.php?fname=$fname&lname=$lname&eno=$eno&mob=$mob&sem=$sem&branch=$branch&img=$img_name&fname_valid=$fname_valid&lname_valid=$lname_valid&eno_valid=$eno_valid&mob_valid=$mob_valid&img_valid=$img_valid");
            die();
        }

        try{
            if(isset($_REQUEST['update'])){
                $query = "update student_info set First_Name = '$fname', Last_Name = '$lname', Semester = $sem, Mobile = $mob, Photo = '$img_db', Branch = '$branch' where Enrollment = $eno";
            }
            else{
                $query = "insert into student_info values ('$fname', '$lname' ,$eno, $sem, $mob, '$img_db', '$admin','$branch')";
            }
            $sql = mysqli_query($con,$query);
            
            if($img_valid){
                $dest = 'student_img/'.$img_db;
                move_uploaded_file($img_tmp,$dest);
            }

            if($sql){
                if(isset($_REQUEST['update'])){
                    header("location:View_all_students.php?status=success");
                }
                else{
                    header("location:Add_Student.php?status=success");
                }
            }
            else{
                if(isset($_REQUEST['update'])){
                    header("location:Add_Student.php?status=fail");
                }
                else{
                    header("location:Add_Student.php?status=fail");
                }
            }
        }
        catch(Exception $e){
            if(isset($_REQUEST['update'])){
                print_r($e);
                exit;
                header("location:Update.php?status=exception");
            }
            else{
                echo "No!!";
                exit;
                header("location:Add_Student.php?status=exception");
            }
        }
    }
    else{
        header("location:Add_Student.php?status=fail");
    }

    mysqli_close($con);
?>
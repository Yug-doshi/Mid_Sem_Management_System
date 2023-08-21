<?php
session_start();
include("validate_login.php");
    $pattern = '/^[A-z ]+$/';
    $pattern3 = '/^[0-9]{10}$/';

    $hostname = "localhost";
    $uname = "root";
    $password = "";
    $database = "admin";

    $con = mysqli_connect($hostname, $uname, $password, $database);

    if($con)
    {
        $tname=$_POST['tname'];
        $tmob=$_POST['tmob'];
        $tsalary=$_POST['tsalary'];
        // $id=$_REQUEST['id'];

        $validtname=1;
        $validtmob=1;
        $validtsalary=1;

        if(isset($_REQUEST['update']))
        {
            if(!preg_match($pattern,$tname))
            {
                $validtname=0;
            }
            else if(!preg_match($pattern3,$tmob))
            {
                $validtmob=0;
            }
        }
        else
        {
            if(!preg_match($pattern,$tname))
            {
                $validtname=0;
            }
            else if(!preg_match($pattern3,$tmob))
            {
                $validtmob=0;
            }
        }

        if(!($validtname and $validtmob and $validtsalary))
        {
            header("location:Add_Teacher.php?tname=$tname&tmob=$tmob&tsalary=$tsalary&validtname=$validtname&validtsalary=$validtsalary&validtmob=$validtmob");
            die();
        }

        try
        {
            if(isset($_REQUEST['update']))
            {
                $query="UPDATE teacher_info set Teacher_Name='$tname' , Teacher_Mob='$tmob' , Teacher_Salary='$tsalary' WHERE Teacher_Id=$id";
            }
            else
            {
                $query="insert into teacher_info values ('','$tname', '$tmob', '$tsalary')";
            }
            
            $sql=mysqli_query($con,$query);
            if($sql)
            {
                if(isset($_REQUEST['update']))
                {
                    header("Location:View_All_Teacher.php?status=success");
                }
                else
                {
                    header("Location:Add_Teacher.php?status=success");
                }
            }
            else
            {
                if(isset($_REQUEST['update']))
                {
                    header("Location:Add_Teacher.php?status=fail");
                }
                else
                {
                    header("Location:Add_Teacher.php?status=fail");
                }
            }
        }
        catch(Exception $e){
            header("location:Add_Teacher.php?status=exception");
        }
    }
    else{
        header("location:Add_Student.php?status=fail");
    }

    mysqli_close($con);
?>
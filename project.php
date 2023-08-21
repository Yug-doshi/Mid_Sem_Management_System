<?php
    $user=$_GET['loginAs'];
    if($user=="teacher")
    {
        header("location:Teacher/login_teacher_part.php");
    }
    else if($user=="student")
    {
        header("location:Student/Login.php");
    }
    else
    {
        header("location:Admin/Login.php");
    }
?>
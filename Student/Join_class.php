<?php 
    session_start();
    $classcode = $_GET['classcode'];
    $eno = $_SESSION['student_eno'];
    $name = $_SESSION['student_name'];

    $con = mysqli_connect("localhost", 'root', "", "admin");
    
    $query = "select * from classroom_for_teacher where Class_code = '$classcode'";

    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) == 0){
        header("location:Join.php?status=failure&classcode=$classcode");
    }
    else{
        $query2 = "insert into classroom_students values('$classcode', '$name', '$eno')";
        $sql = mysqli_query($con,$query2);
        header("location:Student_home.php?status=success");
    }
?>
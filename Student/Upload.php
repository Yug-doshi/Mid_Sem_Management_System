<?php 
    session_start();
    $classcode = $_POST['classcode'];
    $eno = $_SESSION['student_eno'];
    $name = $_SESSION['student_name'];

    $con = mysqli_connect("localhost","root","","admin");

    $project_name = $_FILES['project']['name'];
    $project_size = $_FILES['project']['size'];
    $project_tmp = $_FILES['project']['tmp_name'];

    $pos = strpos($project_name,'.');
    $ext = substr($project_name,$pos+1,);

    $project_db = $eno.'.'.$ext;
    $dest = '../projects/'.$project_db;

    $query = "insert into projects values('$name', $eno, '$classcode', '$project_db')";
    $sql = mysqli_query($con,$query);

    if($sql){
        move_uploaded_file($project_tmp,$dest);
        header("location:Upload_project.php?status=success&Class_code=$classcode");
    }


?>
<?php 
    session_start();
    include('validate_login.php');
    $classcode = $_POST['classcode'];
    $teacher = $_SESSION['uname'];
    $id = $_SESSION['Teacher_Id'];

    $con = mysqli_connect("localhost","root","","admin");

    $result_name = $_FILES['result']['name'];
    $result_size = $_FILES['result']['size'];
    $result_tmp = $_FILES['result']['tmp_name'];

    $pos = strpos($result_name,'.');
    $ext = substr($result_name,$pos+1,);
    $ext = strtolower($ext);

    // $result_db = $id.'.'.$ext;
    $dest = '../Results/'.$result_name;
    $valid_ext = array('pdf');

    $result_valid = 1;

    if(!in_array($ext, $valid_ext)){
        $result_valid = 0;
    }

    if($result_valid){
        $query = "insert into result values('$classcode', '$teacher','$id','$result_name')";
        $sql = mysqli_query($con,$query);
        move_uploaded_file($result_tmp, $dest);
    }
    else{
        header("location:Upload_Result.php?status=failure&Class_code=$classcode");
        die();
    }


    if($sql){
        move_uploaded_file($result_tmp,$dest);
        header("location:Upload_Result.php?status=success&Class_code=$classcode");
    }

    
?>
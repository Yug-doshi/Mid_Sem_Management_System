<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href = "style_admin.css" rel = "stylesheet" type = "text/css">
</head>
<body>
    <?php 
        $id = $_REQUEST['id'];
        $con = mysqli_connect("localhost","root","","admin");
        // $name = mysqli_query($con, "select First_Name from student_info where 	Enrollment = $eno");
        $result = mysqli_query($con, "select * from teacher_info where Teacher_Id = $id");
        $row = mysqli_fetch_array($result);
        session_start();
        include("validate_login.php");
        require_once("Navbar.php");
        if(isset($_REQUEST['status'])){
            if($_REQUEST['status'] == 'success'){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!!</strong> Teacher updated successfully <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else if($_REQUEST['status'] == 'fail'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failure!!</strong> Teacher not updated  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else if($_REQUEST['status'] == 'exception'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failure!!</strong> Student not updated due to duplicate mobile number '.  $_REQUEST['problem'] .'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
    ?>
    <h1 align = "center" class = "myheading">Update Teacher</h1>
    <div class = "container mt-4">
    <form action = "Add_teacher_action.php?update=true&id=<?php echo $id?>" method = "post">
        <input type = "text" disabled placeholder = "Enter full Name" class = "form-control input border border-dark" required name = "tname" value = "<?php if(isset($_REQUEST['tname'])) { echo $_REQUEST['tname']; } else if(isset($_REQUEST['id'])) {echo $row['Teacher_Name'];}?>">

        <?php 
          if(isset($_REQUEST['validtname']) && $_REQUEST['validtname'] == 0){
            echo '<span style = "color:red">Enter valid name</span>';     
            }
        ?>
        <br> <br>

        <input type = "number" disabled placeholder = "Enter Mobile number" required class = "form-control border border-dark" name = "tmob" value ="<?php if(isset($_REQUEST['tmob'])) { echo $_REQUEST['tmob']; } else if(isset($_REQUEST['id'])) {echo $row['Teacher_Mob'];}?>">

        <?php 
           if(isset($_REQUEST['validtmob']) && $_REQUEST['validtmob'] == 0){
                echo '<span style = "color:red">Enter valid mobile number</span>';     
            }
        ?>
        <br> <br>
         <input type = "number" disabled placeholder = "Enter Salary" required class = "form-control border border-dark" name = "tsalary" value ="<?php if(isset($_REQUEST['tsalary'])) { echo $_REQUEST['tsalary']; } else if(isset($_REQUEST['id'])) {echo $row['Teacher_Salary'];}?>">
        <?php 
           if(isset($_REQUEST['validtsalary']) && $_REQUEST['validtsalary'] == 0){
                echo '<span style = "color:red">Enter valid Salary</span>';     
            }
        ?>
        <br><br>
        <input type = "text" value = "<?php echo $_SESSION['tname']?>" hidden name = "admin">
        <input type = "submit" class = "btn btn-success" name = "submit">
    </form>
</div>
</body>
</html>


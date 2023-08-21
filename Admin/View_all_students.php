<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href = "style_admin.css" rel = "stylesheet" type = "text/css">
</head>
<body>
    <?php include_once("Navbar.php") ?>
    <?php 
        // include_once("validate.php");
        session_start();
        include("validate_login.php");
    $con = mysqli_connect("localhost","root","","admin");

    if(!$con){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!!</strong> Database not connected <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    else{
        if(isset($_REQUEST['name'])){
            $name = $_GET['name'];
            $query = "select * from student_info where First_Name like '$name%'";
            $result = mysqli_query($con,$query);
        }
        else{
            $query = "select * from student_info";
            $result = mysqli_query($con,$query);
        }
    }
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'fail'){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!!</strong> Unable to delete student recird <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
?>
    <h1 align = "center" class = "total text-success mt-3">Total Students: <?php echo mysqli_num_rows($result);?></h1>
    <form action = "View_all_students.php" align = "center">
        <input type = "text" placeholder = "Enter name of student to search:" name = "name" class = " form-control w-25 border border-dark mt-4 mb-4" style = "margin-left:38vw;text-align:center;">
        <input type = "submit" value = "Search" class = "btn btn-success">
    </form>

    <table class="table table-hover table-striped container mt-5">
        <thead class="table-dark">
            <tr align="center">
                <th>ENROLLMET NO</th>
                <th>FIRSTNAME</th>
                <th>LASTNAME</th>
                <th>BRANCH</th>
                <th>SEMESTER</th>
                <th>MOBILE NO</th>
                <th>DELETE</th>
                <th>CHANGE STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($row = mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <?php echo $row['Enrollment']; ?> </td>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <?php echo $row['First_Name']; ?> </td>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <?php echo $row['Last_Name']; ?> </td>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <?php echo $row['Branch']; ?> </td>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <?php echo $row['Semester']; ?> </td>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <?php echo $row['Mobile']; ?> </td>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <a href = 'Delete.php?eno=<?php echo $row['Enrollment']?>'><img src = "images/delete.png" height = "40"></a> </td>
                            <td style = "text-align:center"> <a href = "Update.php?eno=<?php echo $row['Enrollment']?>"><img src = "images/refresh-page-option.png" height = "40"></a> </td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>


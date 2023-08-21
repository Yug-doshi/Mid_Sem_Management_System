<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href = "style_admin.css" rel = "stylesheet" type = "text/css">
</head>
<body>
    <?php include_once("Navbar.php") ?>
    <?php
        session_start();
        include("validate_login.php");
        $conn=mysqli_connect("localhost","root","","admin");
        if(!$conn)
        {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failure!!</strong> Database not connected <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        else
        {
            if(isset($_REQUEST['tname']))
            {
                $tname=$_GET['tname'];
                $query = "select * from teacher_info where Teacher_Name like '$tname%'";
                $result = mysqli_query($conn,$query);
            }
            else
            {
                $query="select * from teacher_info";
                $result = mysqli_query($conn,$query);
            }
        }
        if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'fail'){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!!</strong> Unable to delete student recird <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <h1 align = "center" class = "total text-success mt-3">Total Teachers: <?php echo mysqli_num_rows($result);?></h1>
    <form action = "View_all_teacher.php" align = "center">
        <input type = "text" placeholder = "Enter name of Teacher to search:" name = "tname" class = " form-control w-25 border border-dark mt-4 mb-4" style = "margin-left:38vw;text-align:center;">
        <input type = "submit" value = "Search" class = "btn btn-success">
    </form>
    <table class="table table-hover table-striped container mt-5">
        <thead class="table-dark">
            <tr align="center">
                <th>Id</th>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Salary</th>
                <th>DELETE</th>
                <th>CHANGE STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($row = mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <?php echo $row['Teacher_Id']; ?> </td>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <?php echo $row['Teacher_Name']; ?> </td>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <?php echo $row['Teacher_Mob']; ?> </td>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <?php echo $row['Teacher_Salary']; ?> </td>
                            <td style = "text-align:center;font-size:20px;font-weight:bold"> <a href = 'Delete_teacher.php?id=<?php echo $row['Teacher_Id']?>'><img src = "images/delete.png" height = "40"></a> </td>
                            <td style = "text-align:center"> <a href = "Update_Teacher.php?id=<?php echo $row['Teacher_Id']?>"><img src = "images/refresh-page-option.png" height = "40"></a> </td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>


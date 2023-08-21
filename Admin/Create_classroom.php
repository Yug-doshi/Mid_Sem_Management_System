<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Classroom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        require_once("Navbar.php"); 
        session_start();
        include("validate_login.php");

        if(isset($_REQUEST['status']) or isset($_REQUEST['suc'])){
            if($_REQUEST['suc'] == 'success'){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!!</strong> Classroom created successfully <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else if($_REQUEST['status'] == 'duplicate'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failure!!</strong>'. $_REQUEST['msg'] .'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failure!!</strong> Classroom not created  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
     ?>
    <h1 align = "center" class = "myheading mt-3">Create Classroom</h1>
    <div class = "container mt-4">
        <form action = "Add_Classroom.php" method = "post" enctype = "multipart/form-data">
        <input type = "text" placeholder = "Enter classroom name" class = "form-control input border border-dark" required name = "classname" value = "<?php if(isset($_REQUEST['teacher']) or isset($_REQUEST['status'])){echo $_REQUEST['classname']; } ?>"> 
        <br> <br>

        <input type = "text" placeholder = "Enter teacher name" class = "form-control input border border-dark" required name = "teachername" value = "<?php if(isset($_REQUEST['teacher']) or isset($_REQUEST['status'])){echo $_REQUEST['teacher']; } ?>" >

        <?php 
            if(isset($_REQUEST['teacher']) and $_REQUEST['teacher_valid'] == 0){
                echo '<span style = "color:red;">Enter valid name</span>';
            }
        ?>

        <br> <br>
        <label class = "form-label">Upload Classroom's Coverpage Image</label>
        <input type = "file" class = "form-control border border-dark" name = "coverimage"> <br> <br>
        <?php 
            if(isset($_REQUEST['img_valid']) and $_REQUEST['img_valid'] == 0){
                echo '<span style = "color:red">Enter valid image with .png or .jpg or .jpeg extension</span><br><br>';
            }
        ?>
        <input type = "text" hidden value = "<?php echo $_SESSION['uname']?>" name = "admin">
        <input type = "text" placeholder = "Enter class code" class = "form-control input border border-dark" required name = "classcode" value = "<?php if(isset($_REQUEST['teacher'])){echo $_REQUEST['classcode']; } 
        else{echo substr(uniqid('',true), 0, 10); } ?>" hidden >
        <br> <br>
        <input type = "submit" class = "btn btn-success" name = "submit">
        </form>
    </div>
</body>
</html>
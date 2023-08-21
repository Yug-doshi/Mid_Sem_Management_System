<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href = "style_admin.css" rel = "stylesheet" type = "text/css">
</head>
<body>
    <?php 
        session_start();
        include("validate_login.php");
        require_once("Navbar.php");
        if(isset($_REQUEST['status'])){
            if($_REQUEST['status'] == 'success'){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!!</strong> Student added successfully <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else if($_REQUEST['status'] == 'fail'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failure!!</strong> Student not added  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else if($_REQUEST['status'] == 'exception'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failure!!</strong> Student not added due to duplicate enrollment number or mobile number<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
    ?>
    <h1 align = "center" class = "myheading">Add Student</h1>
    <div class = "container mt-4">
    <form action = "Add_student_action.php" method = "post" enctype = "multipart/form-data">
        <input type = "text" placeholder = "Enter first name" class = "form-control input border border-dark" required name = "fname" value = "<?php if(isset($_REQUEST['fname'])) { echo $_REQUEST['fname']; }?>">

        <?php 
           if(isset($_REQUEST['fname_valid']) && $_REQUEST['fname_valid'] == 0){
            echo '<span style = "color:red">Enter valid name</span>';     
            }
        ?>
        <br> <br>

        <input type = "text" placeholder = "Enter last name" class = "form-control input border border-dark" required name = "lname" value = "<?php if(isset($_REQUEST['lname'])) { echo $_REQUEST['lname']; }?>">

        <?php 
           if(isset($_REQUEST['lname_valid']) && $_REQUEST['lname_valid'] == 0){
                echo '<span style = "color:red">Enter valid name</span>';     
            }
        ?>
        <br> <br>
        <input type = "number" placeholder = "Enter enrollment number" required class = "form-control border border-dark" name = "eno" value = "<?php if(isset($_REQUEST['eno'])) { echo  $_REQUEST['eno']; }?>"> 

        <?php 
           if(isset($_REQUEST['eno_valid']) && $_REQUEST['eno_valid'] == 0){
                echo '<span style = "color:red">Enter valid enrollment number</span>';     
            }
        ?>
        <br> <br>

        <select class="form-select form-select-sm border border-dark" aria-label=".form-select-sm example" name = "sem">
        <option selected required >Enter Semester</option>
        <option value="1" <?php if(isset($_REQUEST['sem']) && $_REQUEST['sem'] == 1){echo "selected";}?>>1</option>
        <option value="2" <?php if(isset($_REQUEST['sem']) && $_REQUEST['sem'] == 2){echo "selected";}?>>2</option>
        <option value="3" <?php if(isset($_REQUEST['sem']) && $_REQUEST['sem'] == 3){echo "selected";}?>>3</option>
        <option value="4" <?php if(isset($_REQUEST['sem']) && $_REQUEST['sem'] == 4){echo "selected";}?>>4</option>
        <option value="5" <?php if(isset($_REQUEST['sem']) && $_REQUEST['sem'] == 5){echo "selected";}?>>5</option>
        <option value="6" <?php if(isset($_REQUEST['sem']) && $_REQUEST['sem'] == 6){echo "selected";}?>>6</option>
        <option value="7" <?php if(isset($_REQUEST['sem']) && $_REQUEST['sem'] == 7){echo "selected";}?>>7</option>
        <option value="8" <?php if(isset($_REQUEST['sem']) && $_REQUEST['sem'] == 8){echo "selected";}?>>8</option>
        </select>

        <br> <br>   

        <select class="form-select form-select-sm border border-dark" aria-label=".form-select-sm example" name = "branch">
        <option selected required >Enter Branch</option>
        <option value="Computer" <?php if(isset($_REQUEST['branch']) && $_REQUEST['branch'] == "Computer"){echo "selected";}?>>Computer</option>
        <option value="IT" <?php if(isset($_REQUEST['branch']) && $_REQUEST['branch'] == "IT"){echo "selected";}?>>IT</option>
        <option value="Electrical" <?php if(isset($_REQUEST['branch']) && $_REQUEST['branch'] == "Electrical"){echo "selected";}?>>Electrical</option>
        <option value="Automobile" <?php if(isset($_REQUEST['branch']) && $_REQUEST['branch'] == "Automobile"){echo "selected";}?>>Automobile</option>
        <option value="Civil" <?php if(isset($_REQUEST['branch']) && $_REQUEST['branch'] == "Civil"){echo "selected";}?>>Civil</option>
        <option value="Mechanical" <?php if(isset($_REQUEST['branch']) && $_REQUEST['branch'] == "Mechanical"){echo "selected";}?>>Mechanical</option>
        <option value="CDDM" <?php if(isset($_REQUEST['branch']) && $_REQUEST['branch'] == "CDDM"){echo "selected";}?>>CDDM</option>
        </select>

        <br> <br>

        <input type = "number" placeholder = "Enter your mobile number"  class = "form-control border border-dark" name = "mob" value = "<?php if(isset($_REQUEST['mob'])) { echo  $_REQUEST['mob']; }?>" required>

        <?php 
           if(isset($_REQUEST['mob_valid']) && $_REQUEST['mob_valid'] == 0){
                echo '<span style = "color:red">Enter valid mobile number</span>';     
            }
        ?>

        <br> <br>
        <label class = "form-label">Upload Student's photo</label>
        <input type = "file" class = "form-control border border-dark" name = "photo" required> <br>

        <?php 
           if(isset($_REQUEST['img_valid']) && $_REQUEST['img_valid'] == 0){
                echo '<span style = "color:red">Enter valid image with .png or .jpg or .jpeg extension</span><br><br>';     
            }
        ?>
        <input type = "text" value = "<?php echo $_SESSION['uname']?>" hidden name = "admin">
        <input type = "submit" class = "btn btn-success" name = "submit">
    </form>
</div>
</body>
</html>


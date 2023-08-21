<?php 
    $Class_code = $_REQUEST['Class_code'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        include("Classroom_nav.php");

        if(isset($_REQUEST['status']) and $_REQUEST['status'] == 'success'){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucess!</strong> Project uploaded!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }

    ?>
    <div style = "text-align:center;" class = "container">
        <h1 class = "mt-3">Upload Project</h1>
        <form action = "Upload.php" enctype = "multipart/form-data" method = "post">
            <input type = "file" class = "form-control border border-dark" placeholder = "Upload your project" name = "project" required> <br>
            <input type = "text" value = "<?php echo $Class_code; ?>" hidden name = "classcode">
            <input type = "submit" class = "btn btn-success" value = "Upload">
        </form>
    </div>
</body>
</html>
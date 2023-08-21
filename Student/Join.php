<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join a class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
    include("Navbar.php");
    
    if(isset($_REQUEST['status'])){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!!</strong> Invalid Class Code <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <div style = "text-align:center;" class = "container">
        <h1 class = "mt-3">Join a class</h1>
        <form action = "Join_class.php">
            <input type = "text" class = "form-control border border-dark" placeholder = "Enter class code" name = "classcode" <?php if(isset($_REQUEST['status'])){echo $_REQUEST['classcode']; } ?>> <br>
            <input type = "submit" class = "btn btn-success" value = "Join">
        </form>
    </div>
</body>
</html>
<?php 
session_start();
include('validate_login.php');
    $Class_code = $_REQUEST['Class_code'];
    $con = mysqli_connect('localhost','root','','admin');

    if($con){
        $query = "select * from classroom_for_teacher where Class_code = '$Class_code'";
        $result = mysqli_query($con,$query);
        $result = mysqli_fetch_array($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $result['Class_Name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        .imgdiv{
            text-align:center;
       
        }
        .img{
            height:200px;
            border-radius:10px;
        }
    </style>
</head>
<body>
    <?php include("Classroom_nav.php"); ?>
    <div class = "imgdiv mt-2">
        <img src = "../classroom_img/<?php echo $result['Class_Cover_Image']?>" class = "img">
    </div>
    <h1 style = "text-align:center;" class = "mt-3"><?php echo $result['Class_Name'];?></h1> <hr>
    <div style = "text-align:center;width:50vw;margin-left:25vw;">
    <h2 style = "color:#0f9669;">Results</h2>
    <div style = "height:2px;background-color:#0f9669"></div>
                <?php 
                    $query2 = "select * from result where Class_code = '$Class_code' ";
                    $result2 = mysqli_query($con,$query2);

                    while($row = mysqli_fetch_array($result2)){
                        ?>
                        
                            <div style = "display:flex;justify-content: center;">
                            <a class = "font-weight-bold ms-4 h4 mt-2" href = "Download_Result.php?file=<?php echo $row['Result']; ?>" style = "color:#0f9669;"><?php echo $row['Result']; ?></a>
                            </div>
                            <hr>
                        <?php 
                    }
                ?>

    </div>
</body>
</html>
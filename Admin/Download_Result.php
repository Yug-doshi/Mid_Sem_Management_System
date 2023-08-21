<?php 
session_start();
include("validate_login.php");
    $con = mysqli_connect('localhost','root','','admin');

    $file =  '../Results/'.$_REQUEST['file'];

    header("content-disposition: attachment; filename =". urlencode($file));

    $fb = fopen($file, 'r');

    while(!feof($fb)){
        echo fread($fb, 8192);
        flush();
    }
    fclose($fb);
?>
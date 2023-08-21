<?php 
    @session_start();
    $eno = $_SESSION['student_eno'];
    $con = mysqli_connect("localhost", 'root', "", "admin");
    $query = "select * from student_info where Enrollment = $eno";
    $result = mysqli_query($con, $query);
    $result = mysqli_fetch_array($result);
?>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="Student_home.php">MSMS| <?php echo $result['First_Name']; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <form class="d-flex" role="search" action = "Logout.php">
        <button class="btn btn-primary" type="submit">Logout</button>
      </form>
    </div>
  </div>
</nav>
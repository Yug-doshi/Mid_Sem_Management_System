<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="Admin_home.php">MSMS|Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown ms-5">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Students
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Add_student.php">Add Student</a></li>
            <li><a class="dropdown-item" href="View_all_students.php">View All Students</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown ms-5">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Teachers
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Add_Teacher.php">Add Teacher</a></li>
            <li><a class="dropdown-item" href="View_All_teacher.php">View All Teachers</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown ms-5">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Classrooms
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="View_all_classroom.php">View All Classroom</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex logout" action = "Logout.php">
        <button class="btn btn-primary mr-3" type="submit">Logout</button>
      </form>
    </div>
  </div>
</nav>


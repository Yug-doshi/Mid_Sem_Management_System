<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="Student_home.php">MSMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Class.php?Class_code=<?php echo $Class_code; ?>">Result and Project</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link active" href="Class_people.php?Class_code=<?php echo $Class_code; ?>">People</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link active" href="Upload_project.php?Class_code=<?php echo $Class_code; ?>">Upload Project</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action = "logout.php">
        <button class="btn btn-primary" type="submit">Logout</button>
      </form>
    </div>
  </div>
</nav>
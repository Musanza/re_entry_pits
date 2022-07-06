<?php
session_start();
include 'database/config.php';
if (!isset($_SESSION['username'])) {
	header("location: index.php");
}

$staffId = $_SESSION['id'];
$sch_id = $_SESSION['sch_id'];
$role = $_SESSION['role'];
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home | Re-Entry Policy Tracking System</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvas" role="button" aria-controls="offcanvas"><span class="navbar-toggler-icon"></span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Re-Entry Policy Tracking System</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Account
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="profile.php"><i icon-name="user"></i> Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php"><i icon-name="log-out"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Offcanvas -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasLabel">Re-Entry Policy Tracking System</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul>
        <li  class="bg-gold">
          <a href="home.php"><i icon-name="menu"></i> Home</a>
        </li>
        <li>
          <a href="add-maternity-leave.php"><i icon-name="contact"></i> Maternity Leave</a>
        </li>
        <li>
          <a href="school-record.php"><i icon-name="clipboard"></i> School Record</a>
        </li>
        <li>
          <a href="status.php"><i icon-name="line-chart"></i> Status</a>
        </li>
        <li>
          <a href="users.php"><i icon-name="users"></i> Users</a>
        </li>
        <li>
          <a href="logout.php"><i icon-name="log-out"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>
  <main id="account">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="add-maternity-leave.php">
          <div class="card">
            <i icon-name="contact"></i> Maternity Leave
            <span class="badge rounded-pill text-bg-light">+</span>
          </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="school-record.php">
          <div class="card">
            <i icon-name="clipboard"></i> School Records
            <span class="badge rounded-pill text-bg-light">
              <?php
              $query = "SELECT * FROM `records` WHERE `sch_id` = '$sch_id'";
              $fetch = $mysqli->query($query) or die($mysqli->error.__LINE__);
              echo $num_records = $fetch->num_rows;
              ?>
            </span>
          </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="status.php">
          <div class="card">
            <i icon-name="line-chart"></i> Status
            <span class="badge rounded-pill text-bg-light">
            <?php
              $query = "SELECT * FROM `records`";
              $fetch = $mysqli->query($query) or die($mysqli->error.__LINE__);
              echo $num_records = $fetch->num_rows;
              ?>
            </span>
          </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="users.php">
          <div class="card">
            <i icon-name="users"></i> Users
            <span class="badge rounded-pill text-bg-light">
            <?php
              $query = "SELECT * FROM `users`";
              $fetch = $mysqli->query($query) or die($mysqli->error.__LINE__);
              echo $num_records = $fetch->num_rows;
              ?>
            </span>
          </div>
          </a>
        </div>
     </div>
   </div>
 </main>
 <footer>
  <div class="copyright">
  Re-Entry Policy Tracking System &copy; <?php echo date('Y'); ?>. All Rights Reserved.
  </div>
</footer>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<!-- Development version -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<!-- Production version -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
  </script>
</body>
</html>
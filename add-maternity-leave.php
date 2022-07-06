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
  <title>Add Record | Re-Entry Policy Tracking System</title>
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
        <li>
          <a href="home.php"><i icon-name="menu"></i> Home</a>
        </li>
        <li class="bg-gold">
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
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <center>
            <div class="subtitle text-uppercase">maternity leave and re-admission</div>
          </center>
          <div class="add-leave-form">
            <?php if (isset($success)) { ?>
              <div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Well done!</strong> <?php echo $success; ?></a>
              </div>
            <?php } if (isset($error)) { ?>
              <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Oh snap!</strong> <?php echo $error; ?></a>
              </div>
            <?php } ?>
            <form method="post">
              <div class="form-group">
                <label class="form-label mt-4">Parent/Guardian</label>
                <input type="text" name="guardian" class="form-control" placeholder="Enter name" required>
              </div>
              <div class="form-group">
                <label class="form-label mt-4">Girl name</label>
                <input type="text" name="g_name" class="form-control" placeholder="Enter name" required>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label mt-4">Grade</label>
                    <select name="g_grade" id="grade" class="form-control">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label mt-4">Class</label>
                    <input type="text" name="g_class" class="form-control" placeholder="Enter class" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label mt-4">Date Issued</label>
                    <input type="text" name="date_issued" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label mt-4">Re-Admission Date</label>
                    <input type="date" name="re_entry_date" class="form-control" placeholder="Enter date" required>
                  </div>
                </div>
              </div>
              <br>
              <input type="submit" name="add-record" class="btn btn-primary form-control" value="Add Record">
            </form>
          </div>
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
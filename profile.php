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
$name = $_SESSION['name'];

if (isset($_GET['profile_info'])) {
  $info = $_GET['profile_info'];
  $query = "SELECT * FROM `users` WHERE md5(id) = '$info'";
  $select = $mysqli->query($query) or die($mysqli->error.__LINE__);
  $data = mysqli_fetch_assoc($select);
  $u_name = $data['name'];
  $u_email = $data['email'];
  $u_id = $data['id'];
  $u_phone = $data['phone'];
}

if (isset($_GET['del_profile'])) {
  $del = $_GET['del_profile'];
  $query = "DELETE FROM `users` WHERE md5(id) = '$del'";
  $select = $mysqli->query($query) or die($mysqli->error.__LINE__);
  if ($select) {
    $success = 'Profile deleted successfully!';
    header('Refresh: 0; URL = logout.php');
  } else {
    $error = 'Query failed. Please try again later.';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $username; ?> | Re-Entry Policy Tracking System</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
  <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->

  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
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
          <a href="commitments.php"><i icon-name="users"></i> Commitments</a>
        </li>
        <li>
          <a href="schools.php"><i icon-name="building-2"></i> Schools</a>
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
  <main>
    <div class="container">
      <div class="row">
        <div class="col-md-6 pd-50 pd-all-50 bg-light profile text-center">
          <div class="avatar">
            <img src="assets/images/avatar.png" alt="">
          </div>
          <div class="title text-capitalize"><?php echo $name; ?></div>
          <div class="subtitle"><?php echo $username; ?></div>
          <p>Role: 
            <?php
            if ($role == 1) {
              echo 'Administrator';
            } else if ($role == 2) {
              echo 'School Manager';
            } else if ($role == 3) {
              echo 'Counsellor';
            }
            ?>
          </p>
          <p>School name: 
            <?php
            $sql = "SELECT `name` FROM `schools` WHERE `sch_id` = '$sch_id'";
            $select = $mysqli->query($sql) or die($mysqli->error.__LINE__);
            $data = mysqli_fetch_assoc($select);
            echo $data['name'];
            ?>
          </p>
          <p>Phone number: 
            <?php
            $sql = "SELECT `phone` FROM `users` WHERE `sch_id` = '$sch_id'";
            $select = $mysqli->query($sql) or die($mysqli->error.__LINE__);
            $data = mysqli_fetch_assoc($select);
            echo $data['phone'];
            ?>
          </p>
          <p><a href="profile.php?profile_info=<?php echo md5($staffId); ?>" class="edit btn bg-gold text-white"><i icon-name="user-cog"></i> <span>Edit</span></a> <span><a href="profile.php?del_profile=<?php echo md5($staffId); ?>" class="edit btn btn-danger text-white"><i icon-name="user-x"></i> <span>Delete Profile</span></a></span></p>
        </div>
        <?php
        if (isset($_GET['profile_info'])) {?>
          <div class="col-md-6 pd-50 pd-all-50">
            <form method="post">
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
              <input type="hidden" name="id" value="<?php echo $u_id; ?>">
              <div class="form-group">
                <label class="form-label mt-4">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" value="<?php echo $u_name; ?>">
              </div>
              <div class="form-group">
                <label class="form-label mt-4">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php echo $u_email; ?>">
              </div>
              <div class="form-group">
                <label class="form-label mt-4">Phone</label>
                <input type="phone" name="phone" class="form-control" placeholder="Enter phone" value="<?php echo $u_phone; ?>">
              </div>
              <div class="form-group">
                <label class="form-label mt-4">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
              </div>
              <br>
              <input type="submit" name="update-profile" class="btn bg-gold text-white" value="Update Profile">
            </form>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
  <footer class="pd-50">
    <div class="copyright">
      Re-Entry Policy Tracking System &copy; <?php echo date('Y'); ?>. All Rights Reserved.
    </div>
  </footer>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Datatables -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
  <script>
    $(document).ready( function () {
     $("#schoolRecordsTable").DataTable({
      "order": [0, 'desc'],
    });
   });
 </script>
 <!-- Lucide -->
 <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
 <script src="https://unpkg.com/lucide@latest"></script>
 <script>
  lucide.createIcons();
</script>
<script type="text/javascript">
    $('.btn-danger').click(function(e){
        var result = confirm("Are you sure you want to delete your profile?");
        if(!result) {
            e.preventDefault();
        }
    });
</script>
</body>
</html>
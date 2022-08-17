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

if (isset($_GET['del_profile'])) {
  $del = $_GET['del_profile'];
  $query = "DELETE FROM `schools` WHERE id = '$del'";
  $select = $mysqli->query($query) or die($mysqli->error.__LINE__);
  if ($select) {
    $success = 'School deleted successfully!';
    header('Refresh: 2; URL = schools.php');
  } else {
    $error = 'Query failed. Please try again later.';
  }
}

if (isset($_GET['school_info'])) {
  $info = $_GET['school_info'];
  $query = "SELECT * FROM `schools` WHERE id = '$info'";
  $select = $mysqli->query($query) or die($mysqli->error.__LINE__);
  $data = mysqli_fetch_assoc($select);
  $u_id = $data['id'];
  $u_name = $data['name'];
  $u_district = $data['district'];
  $u_province = $data['province'];
  $u_tel = $data['tel'];
  $u_type = $data['type'];
  $u_address = $data['address'];
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Schools | Re-Entry Policy Tracking System</title>
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
        <li class="bg-gold">
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
        <?php include 'snippets/manage-school.php'; ?>
      </div>
      <div class="row">
        <div class="col-md-12 pd-50">
          <div class="table-responsive pd-50">
            <table id="schoolRecordsTable" class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>District</th>
                  <th>Province</th>
                  <th>Address</th>
                  <th>Tel</th>
                  <th>Type</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody id="schoolsTable">
                <?php
                $query = "SELECT * FROM `schools`";
                $fetch = $mysqli->query($query) or die($mysqli->error.__LINE__);
                while ($row = mysqli_fetch_assoc($fetch)) {
                  $sch_id = $row['sch_id']; ?>
                  <tr>
                  <td><?php echo $row['sch_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo ucwords($row['district']); ?></td>
                    <td><?php echo ucwords($row['province']); ?></td>
                    <td><?php echo ucwords($row['address']); ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td>
                      <a href="schools.php?del_profile=<?php echo $row['id']; ?>" class="btn btn-danger delete-info"><i icon-name="user-x"></i></a>
                      <a href="schools.php?school_info=<?php echo $row['id']; ?>" class="btn btn-success"><i icon-name="user-cog"></i></a>
                    </td>
                  </tr>

                  <!-- Modal -->
                  <div class="modal fade" id="commitmentModal" tabindex="-1" aria-labelledby="commitmentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                          <h5 class="modal-title" id="commitmentModalLabel">Alert!</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Commitment records not found.
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <a href="commitments.php?sr_no=<?php echo $row['sr_no']; ?>" class="btn bg-gold text-white">Add record</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
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
  <script src="assets/js/states.js"></script>
  <script>
    $(document).ready( function () {
     $("#schoolRecordsTable").DataTable({
      "order": [0, 'asc'],
    });
   });
 </script>
 <!-- Lucide -->
 <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
 <script src="https://unpkg.com/lucide@latest"></script>
 <script> lucide.createIcons(); </script>
 <script type="text/javascript">
    $('.btn-danger').click(function(e){
        var result = confirm("Are you sure you want to delete this school?");
        if(!result) {
            e.preventDefault();
        }
    });
</script>
</body>
</html>
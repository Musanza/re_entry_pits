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
$user = $_SESSION['name'];

if (isset($_GET['del_record'])) {
  $del = $_GET['del_record'];
  $delete_record = "DELETE FROM `commitments` WHERE `sr_no` = '$del'";
  $delete_commitment = "DELETE FROM `commitments` WHERE `sr_no` = '$del'";
  $select = $mysqli->query($delete_record) or die($mysqli->error.__LINE__);
  $select = $mysqli->query($delete_commitment) or die($mysqli->error.__LINE__);
  if ($select) {
    $success = 'Record deleted successfully!';
    header('Refresh: 1; URL = commitments.php');
  } else {
    $error = 'Query failed. Please try again later.';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Commitments | Re-Entry Policy Tracking System</title>
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
              <?php echo $user; ?>
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
        <?php if ($role == 2) { ?>
        <li>
          <a href="add-maternity-leave.php"><i icon-name="contact"></i> Maternity Leave</a>
        </li>
      <?php } ?>
        <li>
          <a href="school-record.php"><i icon-name="clipboard"></i> School Record</a>
        </li>
        <li>
          <a href="status.php"><i icon-name="line-chart"></i> Status</a>
        </li>
        <li class="bg-gold">
          <a href="commitments.php"><i icon-name="users"></i> Commitments</a>
        </li>
        <?php if ($role == 1) { ?>
        <li>
          <a href="schools.php"><i icon-name="building-2"></i> Schools</a>
        </li>
      <?php } if ($role < 3) { ?>
        <li>
          <a href="users.php"><i icon-name="users"></i> Users</a>
        </li>
      <?php } ?>
        <li>
          <a href="logout.php"><i icon-name="log-out"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>
  <main>
    <div class="container">
      <div class="row">
        <div class="col-md-12 pd-50">
          <div class="subtitle text-capitalize">Commitment records</div>
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
          <div class="table-responsive pd-50">
            <table id="schoolRecordsTable" class="table table-striped">
              <thead>
                <tr>
                  <th>Sr No.</th>
                  <th>Girl's name</th>
                  <th>Grade</th>
                  <th>Male</th>
                  <th>Counselling</th>
                  <th>Status</th>
                  <th>Report</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM `records` WHERE `sch_id` = '$sch_id'";
                $fetch = $mysqli->query($query) or die($mysqli->error.__LINE__);
                while ($row = mysqli_fetch_assoc($fetch)) {
                  $sr_no = $row['sr_no'];
                  $g_guardian = $row['guardian']; ?>
                  <tr>
                    <td><?php echo $row['sr_no']; ?></td>
                    <td><?php echo $row['g_name']; ?></td>
                    <td><?php echo $row['g_grade']; ?></td>
                    <td>
                      <?php
                      $query = "SELECT `m_name` FROM `commitments` WHERE `sr_no` = '$sr_no'";
                      $select = $mysqli->query($query) or die($mysqli->error.__LINE__);
                      $data = mysqli_fetch_assoc($select);
                      echo $name = empty($data['m_name']) ? 'No record' : $data['m_name'];
                      ?>
                    </td>
                    <td>
                      <?php
                      $sql = "SELECT * FROM `commitments` WHERE `sr_no` = '$sr_no'";
                      $select = $mysqli->query($sql) or die($mysqli->error.__LINE__);
                      $num_records = $select->num_rows;
                      if ($num_records >= 1) { ?>
                      <a href="#" class="btn text-gold" data-bs-toggle="modal" data-bs-target="#counsellingModal-<?php echo $row['sr_no']; ?>"><i icon-name="plus-circle"></i></a>
                      <?php } else { echo 'No record'; } ?>
                    </td>
                    <td>
                      <?php
                      $sql = "SELECT * FROM `commitments` WHERE `sr_no` = '$sr_no'";
                      $select = $mysqli->query($sql) or die($mysqli->error.__LINE__);
                      $num_records = $select->num_rows;
                      if ($num_records < 1) { ?>
                        <a href="#" class="btn text-gold" data-bs-toggle="modal" data-bs-target="#addCommitmentModal-<?php echo $row['sr_no']; ?>"><i icon-name="plus-circle"></i></a>
                      <?php } else { ?>
                        <i icon-name="check-circle"></i>
                      <?php } ?>
                    </td>
                    <td>
                      <?php
                      $sql = "SELECT * FROM `commitments` WHERE `sr_no` = '$sr_no'";
                      $select = $mysqli->query($sql) or die($mysqli->error.__LINE__);
                      $num_records = $select->num_rows;
                      if ($num_records < 1) { ?>
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#commitmentModal-<?php echo $row['sr_no']; ?>"><i icon-name="printer"></i></a>
                      <?php } else { ?>
                        <a href="commitment_report.php?sr_no=<?php echo $row['sr_no']; ?>" target="blank" class="btn"><i icon-name="printer"></i></a>
                      <?php } ?>
                    </td>
                    <td>
                      <?php
                      $sql = "SELECT * FROM `commitments` WHERE `sr_no` = '$sr_no'";
                      $select = $mysqli->query($sql) or die($mysqli->error.__LINE__);
                      $num_records = $select->num_rows;
                      if ($num_records >= 1) { ?>
                        <a href="commitments.php?del_record=<?php echo $sr_no; ?>" class="btn btn-danger delete-info"><i icon-name="user-x"></i></a>
                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateCommitmentModal-<?php echo $row['sr_no']; ?>"><i icon-name="user-cog"></i></a>
                      <?php } else { echo 'No record'; } ?>
                    </td>
                  </tr>

                  <?php 
                  include 'snippets/no-commitment.php';
                  include 'snippets/add-commitment-record.php';
                  include 'snippets/update-commitment-record.php';
                  include 'snippets/counselling-sessions.php';
                  ?>

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

<script>
  $(document).ready(function() {
    $(document).on('input', 'input[name="g_father_address"]', function() {
      let $value = $(this).val();
      if($('input[type="checkbox"]').is(":checked")) {
        $(document).find('input[name="g_mother_address"]').val($value);
      }
    }); 
  });
</script>
<script>
  $(document).ready(function(){
    let btnAdd = document.querySelector('.g_plus');
    let btnSubtract = document.querySelector('#subtract');
    let input = document.querySelector('#g_counselling');

    btnAdd.addEventListener('click', () =>{
      input.value = parseInt(input.value) + 1;
      console.log(input);
    });

    btnSubtract.addEventListener('click', () =>{
      input.value = parseInt(input.value) - 1;
    });
  });
</script>

<script type="text/javascript">
  $('.delete-info').click(function(e){
    var result = confirm("Are you sure you want to delete this record?");
    if(!result) {
      e.preventDefault();
    }
  });
</script>
</body>
</html>
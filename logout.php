<?php
   session_start();
   unset($_SESSION["id"]);
   unset($_SESSION["role"]);
   session_unset();
   session_destroy();
   header('Refresh: 3; URL = index.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Exiting... | Re-Entry Policy Tracking System</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="assets/css/styles.css" rel="stylesheet">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
  <main id="account">
  <div class="spinner-border" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
<br>
<p class="text-primary">Logging you out. Please wait...</p>
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
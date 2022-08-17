<?php
session_start();
include_once 'database/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Re-Entry Policy Tracking System</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <main id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row logo">
                        <div class="col-md-4">
                            <img src="assets/images/Coat_of_arms_of_Zambia.png" alt="Coat of arms of Zambia">
                        </div>
                        <div class="col-md-8 center">
                            <div class="title">Re-Entry Policy Tracking System</div>
                            <div class="subtitle text-gold"><i>Case study</i></div>
                        </div>
                    </div>
                    <div class="login-form">
                    <?php if (isset($success)) { ?>
                        <div class="spinner-border" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
										<?php } if (isset($error)) { ?>
											<div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Oh snap!</strong> <?php echo $error; ?></a>
</div>
										<?php } ?>
                        <form method="post">
                            <div class="form-group">
                              <label for="inputEmail" class="form-label mt-4">Email address</label>
                              <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
                          </div>
                          <div class="form-group">
                              <label for="inputPassword" class="form-label mt-4">Password</label>
                              <input type="password" name="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" placeholder="Enter password" required>
                          </div>
                          <p><a href="reset.php" class="text-gold">Forgot Password?</a></p>
                          <input type="submit" name="login" class="btn bg-gold text-white form-control" value="Login">
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
</body>
</html>
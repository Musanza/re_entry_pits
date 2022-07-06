<!DOCTYPE html>
<html>
<head>
    <title>Reset Password | Re-Entry Policy Tracking System</title>
    <!-- CSS only -->
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <main id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="title">Reset Password</div>
                    <div class="login-form">
                        <form method="post">
                            <div class="form-group">
                              <label for="inputEmail" class="form-label mt-4">Email address</label>
                              <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
                          </div>
                          <p><a href="index.php">Login In</a></p>
                          <input type="submit" name="reset" class="btn btn-primary form-control" value="Reset">
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
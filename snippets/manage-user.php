<div class="col-md-12 pd-50 panel">
    <div class="panel-head bg-gold text-white">Manage Users</div>
    <div class="panel-body">

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
            
        <form method="post" class="form">
<input type="hidden" name="id" value="<?php echo $info; ?>">
            <div class="row">
              <div class="col-md-6">
            <div class="form-group">
              <label class="form-label mt-4">School</label>
              <select name="sch_id" class="form-control" required>
                  <option value="0">Select school</option>
                  <?php
                $query = "SELECT * FROM `schools` ORDER BY `name` ASC";
                $fetch = $mysqli->query($query) or die($mysqli->error.__LINE__);
                while ($row = mysqli_fetch_assoc($fetch)) { ?>
                  <option value="<?php echo $row['sch_id'];?>"><?php echo $row['name'];?></option>
                <?php } ?>
              </select>
          </div>
      </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter name" value="<?php echo $u_name; ?>" required>
              </div>
          </div>
  </div>

  <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Phone</label>
                  <input type="phone" name="phone" class="form-control" placeholder="Enter phone" value="<?php echo $u_phone; ?>" required>
              </div>
          </div>
          <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php echo $u_email; ?>" required>
              </div>
          </div>
  </div>

  <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Role</label>
                  <select name="role" class="form-control">
                    <option value="<?php echo empty($u_role) ? 'Select role' : $u_role; ?>"><?php echo empty($u_role) ? 'Select school type' : $u_role; ?></option>
                    <option value="1">Administrator</option>
                    <option value="2">School Manager</option>
                    <option value="3">Counsellor</option>
                  </select>
              </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label mt-4">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter password">
          </div>
      </div>
  </div>
<br>
<?php if (isset($_GET['user_info'])) {?>
                <input type="submit" name="update-user" class="btn btn-success" value="Update User">
              <?php } else { ?>
                  <input type="submit" name="add-user" class="btn bg-gold text-white" value="Add User">
                <?php } ?>
</form>
</div>
</div>
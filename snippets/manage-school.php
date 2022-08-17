<div class="col-md-12 pd-50 panel">
  <div class="panel-head bg-gold text-white">Manage schools</div>
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
            <label class="form-label mt-4">School name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" value="<?php echo $u_name; ?>" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label mt-4">Province</label>
            <select name="province" class="form-control" id="province" required>
              <option value="<?php echo empty($u_province) ? 0 : $u_province; ?>"><?php echo empty($u_province) ? 'Select province' : $u_province; ?></option>
              <option value="central">Central</option>
              <option value="copperbelt">Copperbelt</option>
              <option value="eastern">Eastern</option>
              <option value="luapula">Luapula</option>
              <option value="lusaka">Lusaka</option>
              <option value="muchinga">Muchinga</option>
              <option value="north-western">North Western</option>
              <option value="northern">Northern</option>
              <option value="southern">Southern</option>
              <option value="western">Western</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label mt-4">Tel</label>
            <input type="phone" name="tel" class="form-control" placeholder="Enter Tel/Fax/Email" value="<?php echo $u_tel; ?>" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label mt-4">District</label>
            <select name="district" class="form-control" id="district" required>
              <option value="<?php echo empty($u_district) ? 0 : $u_district; ?>"><?php echo empty($u_district) ? 'Select district' : $u_district; ?></option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label mt-4">Address</label>
            <input type="text" name="address" class="form-control" placeholder="Enter address" value="<?php echo $u_address; ?>" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label mt-4">Type</label>
            <select name="type" class="form-control" required>
              <option value="<?php echo empty($u_type) ? 0 : $u_type; ?>"><?php echo empty($u_type) ? 'Select school type' : $u_type; ?></option>
              <option value="grz">GRZ</option>
              <option value="community">Community</option>
              <option value="private">Private</option>
              <option value="grand-aided">Grant Aided</option>
            </select>
          </div>
        </div>
      </div>
      <br>
      <?php if (isset($_GET['school_info'])) {?>
        <input type="submit" name="update-school" class="btn btn-success" value="Update school">
      <?php } else { ?>
        <input type="submit" name="add-school" class="btn bg-gold text-white" value="Add School">
      <?php } ?>


    </form>
  </div>
</div>
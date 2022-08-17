<!-- No commitment record modal -->
<div class="modal fade" id="counsellingModal-<?php echo $row['sr_no']; ?>" tabindex="-1" aria-labelledby="counsellingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post">
      <div class="modal-content">
        <div class="modal-header bg-gold text-white">
          <h5 class="modal-title" id="counsellingModalLabel">Counselling sessions</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
          $sr_no = $row['sr_no'];
          $query = "SELECT * FROM `commitments` WHERE `sr_no` = '$sr_no'";
          $select = $mysqli->query($query) or die($mysqli->error.__LINE__);
          $data = mysqli_fetch_assoc($select);
          ?>

          <input type="hidden" name="sr_no" value="<?php echo $sr_no; ?>">
          <div class="form-group">
            <label class="form-label mt-4">No. of sessions attended by femail pupil</label>
            <input type="number" name="g_counselling_sessions" class="form-control" id="g_counselling" value="<?php echo $data['g_counselling_sessions']; ?>">
          </div>

          <div class="form-group">
            <label class="form-label mt-4">No. of sessions attended by responsible mail</label>
            <input type="number" name="m_counselling_sessions" class="form-control" value="<?php echo $data['m_counselling_sessions']; ?>">
          </div>

          <div class="form-group">
            <label class="form-label mt-4">No. of sessions attended by parents/guardians</label>
            <input type="number" name="p_counselling_sessions" class="form-control" value="<?php echo $data['p_counselling_sessions']; ?>">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <input type="submit" name="add-counselling" class="btn bg-gold text-white" value="Add record">
        </div>
      </div>
    </form>
  </div>
</div>
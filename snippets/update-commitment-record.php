<!-- Add commitment record modal -->
<div class="modal fade" id="updateCommitmentModal-<?php echo $row['sr_no']; ?>" tabindex="-1" aria-labelledby="commitmentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="post">
      <?php
       $sr_no = $row['sr_no'];
       $query = "SELECT * FROM `commitments` WHERE `sr_no` = '$sr_no'";
                      $select = $mysqli->query($query) or die($mysqli->error.__LINE__);
                      $data = mysqli_fetch_assoc($select);
       ?>
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="commitmentModalLabel">Update record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="sr_no" value="<?php echo $sr_no; ?>">
          <div class="bg-light pd-all-10">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Responsible male/Guardian/Father</label>
                  <input type="text" name="m_name" class="form-control" value="<?php echo $data['m_name']; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Date of birth</label>
                  <input type="date" name="dob" class="form-control" value="<?php echo $data['dob']; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label mt-4">Address</label>
                  <input type="text" name="address" class="form-control" value="<?php echo $data['address']; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label mt-4">Name of school for responsible male</label>
                  <input type="text" name="sch_name" class="form-control" value="<?php echo $data['sch_name']; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-label mt-4">Grade (If applicable)</label>
                  <select name="grade" id="grade" class="form-control">
                    <option><?php echo $data['grade']; ?></option>
                  <option value="N/A">Not a pupil</option>
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
              <div class="col-md-8">
                <div class="form-group">
                  <label class="form-label mt-4">Occupation</label>
                  <input type="text" name="occupation" class="form-control" value="<?php echo $data['occupation']; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Male's Guardian/Father (If applicable)</label>
                  <input type="text" name="m_father" class="form-control" value="<?php echo $data['m_father']; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Male's Guardian/Mother (If applicable)</label>
                  <input type="text" name="m_mother" class="form-control" value="<?php echo $data['m_mother']; ?>">
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="bg-light pd-all-10">
            <b>Pregnant girl guardians/parents:</b>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Guardian/Father (If applicable)</label>
                  <input type="text" name="g_father" class="form-control" value="<?php echo $data['g_father']; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Guardian/Mother (If applicable)</label>
                  <input type="text" name="g_mother" class="form-control" value="<?php echo $data['g_mother']; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label mt-4">Same address</label>
                        <input type="checkbox" class="custom-control-input" value="same-address">
                </div>
                </div>
            </div>

            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Guardian/Father Address (If applicable)</label>
                  <input type="text" id="g_father_address" name="g_father_address" class="form-control" value="<?php echo $data['g_father_address']; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Guardian/Mother Address (If applicable)</label>
                  <input type="text" id="g_mother_address" name="g_mother_address" class="form-control" value="<?php echo $data['g_mother_address']; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Guardian/Father Occupation (If applicable)</label>
                  <input type="text" name="g_father_occupation" class="form-control" value="<?php echo $data['g_father_occupation']; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Guardian/Mother Occupation (If applicable)</label>
                  <input type="text" name="g_mother_occupation" class="form-control" value="<?php echo $data['g_mother_occupation']; ?>">
                </div>
              </div>
            </div>

          </div>

          <hr>

          <div class="bg-light pd-all-10">
            <b>More info</b>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Responsible male postal address</label>
                  <input type="text" name="m_p_address" class="form-control" value="<?php echo $data['m_p_address']; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Actual re-entry date</label>
                  <input type="date" name="actual_re_entry" class="form-control" value="<?php echo $data['actual_re_entry']; ?>">
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">School tranfered to</label>
                  <input type="text" name="tranfered_sch" class="form-control" value="<?php echo $data['transfered_sch']; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label mt-4">Transfer reason</label>
                  <input type="text" name="transfer_reason" class="form-control" value="<?php echo $data['transfer_reason']; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label mt-4">Other info</label>
                  <textarea name="other_info" class="form-control"><?php echo $data['other_info']; ?></textarea>
                </div>
              </div>
            </div>

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <input type="submit" name="update-commitment" class="btn btn-success text-white" value="Update record">
        </div>
      </div>
    </form>
  </div>
</div>




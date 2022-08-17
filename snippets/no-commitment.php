<!-- No commitment record modal -->
<div class="modal fade" id="commitmentModal-<?php echo $row['sr_no']; ?>" tabindex="-1" aria-labelledby="commitmentModalLabel" aria-hidden="true">
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
        <a href="#" class="btn bg-gold text-white" data-bs-toggle="modal" data-bs-target="#addCommitmentModal-<?php echo $row['sr_no']; ?>">Add record</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="lead_transfer_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="<?= base_url('leads/transfer') ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lead Transfer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Select User <span class="-req">*</span></label> 
                            <select class="form-control form-control-sm" name="owner" required>
                                <option value="">-- Select --</option>
                                <?php foreach ($this->general_model->get_lead_owners() as $bkey => $bvalue) { ?>
                                    <option value="<?= $bvalue['id'] ?>"><?= $bvalue['name'] ?> - <?= getRole($bvalue['user_type']) ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('owner') ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="lead" id="lead_tranfer_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Transfer</button>
                </div>
            </div>
        </div>
    </form>
</div>
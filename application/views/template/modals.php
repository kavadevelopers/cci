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
                            <select class="form-control form-control-sm select2n" name="owner" required>
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

<div class="modal fade" id="jobTransferModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="<?= base_url('job/transfer') ?>">
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
                            <select class="form-control form-control-sm select2n" name="owner" required>
                                <option value="">-- Select --</option>
                                <?php foreach ($this->general_model->get_job_owners() as $bkey => $bvalue) { ?>
                                    <option value="<?= $bvalue['id'] ?>"><?= $bvalue['name'] ?> - <?= _user_type($bvalue['id']) ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('owner') ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="jobs" id="jobIds">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Transfer</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="leads_transfer_model" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="<?= base_url('leads/transfer_all') ?>">
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
                            <select class="form-control form-control-sm select2n" name="owner" required>
                                <option value="">-- Select --</option>
                                <?php foreach ($this->general_model->get_lead_owners() as $bkey => $bvalue) { ?>
                                    <option value="<?= $bvalue['id'] ?>"><?= $bvalue['name'] ?> - <?= getRole($bvalue['user_type']) ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('owner') ?>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="leads" value="" id="leadIds">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Transfer</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php if($this->uri->segment(1) != 'job'){ ?>
<div class="modal fade bd-example-modal-lg" id="followup_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="" id="followupForm">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Followup</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Remarks <span class="-req">*</span></label> 
                            <textarea class="form-control" placeholder="Remarks" name="remarks" id="followup_remarks" required></textarea>
                            <?= form_error('owner') ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Next Followup Date <span class="-req">*</span></label> 
                                <input name="date" type="text" placeholder="Next Followup Date" class="form-control form-control-sm datepicker-new" value="<?= set_value('date',date('d-m-Y')); ?>" id="followup_date" readonly required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Next Follow up Time</label> 
                                <input name="nftime" type="text" placeholder="From" class="form-control form-control-sm hour-mask" value="" id="followup_timef">
                                <input name="nttime" type="text" placeholder="To" class="form-control form-control-sm hour-mask" value="" id="followup_timet">
                            </div>
                        </div>
                        <div class="checkbox-fade fade-in-primary d-">
                            <label>
                                <input type="checkbox" value="1" name="customer" id="customer_checkbox">
                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                <span class="text-inverse">Client ?</span>
                            </label>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary" id="followup_save">Save</button>
                        </div>
                        <input type="hidden" name="id" id="id_followup_lead">
                        <input type="hidden" name="type" id="type_followup_lead">
                        <input type="hidden" name="cus" id="type_followup_cus">
                        <input type="hidden" name="message" id="message_followup">

                        <table class="table table-bordered table-mini table-no-padding" id="followup_table" style="max-width: 100%; display: none;">
                            <thead>
                                <th class="text-center">Next Followup</th>
                                <th class="text-center">Date</th>
                                <th>Remarks</th>
                                <th class="text-center">Is Client ?</th>
                                <?php if(get_user()['user_type'] == '0' || get_user()['user_type'] == '1'){ ?>
                                    <th>Followup By</th>
                                <?php } ?>
                            </thead>
                            <tbody id="followup_body">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php } ?>
<?php if($this->uri->segment(1) == 'job'){ ?>

<div class="modal fade bd-example-modal-lg" id="job_followup_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="" id="jobfollowupForm">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Followup</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Remarks <span class="-req">*</span></label> 
                            <textarea class="form-control" placeholder="Remarks" name="remarks" id="followup_remarks" required></textarea>
                            <?= form_error('owner') ?>
                        </div>
                        <div class="form-group">
                            <label>Status<span class="-req">*</span></label>
                            <select class="form-control" name="status" id="jobStatus" required>
                                <option value="">-- Select --</option>
                                <?php foreach (getjobStatusList() as $key => $value) { ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Next Followup Date <span class="-req">*</span></label> 
                                <input name="date" type="text" placeholder="Next Followup Date" class="form-control form-control-sm datepicker-new" value="<?= set_value('date',date('d-m-Y')); ?>" id="followup_date" readonly required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Next Follow up Time</label> 
                                <input name="nftime" type="text" placeholder="From" class="form-control form-control-sm hour-mask" value="" id="followup_timef">
                                <input name="nttime" type="text" placeholder="To" class="form-control form-control-sm hour-mask" value="" id="followup_timet">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary" id="followup_save">Save</button>
                        </div>
                        <input type="hidden" name="id" id="id_jobModel">
                        <input type="hidden" name="type" id="type_followup_job">
                        <input type="hidden" name="cus" id="type_followup_jobdone">
                        <input type="hidden" name="message" id="message_followup_job">

                        <table class="table table-bordered table-mini table-no-padding" id="jobfollowup_table" style="max-width: 100%; display: none;">
                            <thead>
                                <th class="text-center">Next Followup</th>
                                <th class="text-center">Date</th>
                                <th>Remarks</th>
                                <th class="text-center">Is Done ?</th>
                                <?php if(get_user()['user_type'] == '0' || get_user()['user_type'] == '1'){ ?>
                                    <th>Followup By</th>
                                <?php } ?>
                            </thead>
                            <tbody id="jobfollowup_body">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php } ?>
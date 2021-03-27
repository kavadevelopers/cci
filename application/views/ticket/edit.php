<div class="page-header">
    <div class="row align-items-end">
        <div class="col-md-12">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4><?= $_title ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="card">
        <form method="post" action="<?= base_url('ticket/update') ?>">
            <div class="card-block">
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Head <span class="-req">*</span></label> 
                            <select class="form-control form-control-sm select2" name="head" required>
                                <option value="">-- Select Head --</option>
                                <?php foreach ($this->db->get_where('ticket_head',['df' => ''])->result_array() as $tKey => $tvalue) { ?>
                                    <option value="<?= $tvalue['name'] ?>" <?= $tvalue['name'] == $ticket['head']?'selected':'' ?>><?= $tvalue['name'] ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('branch') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Select Client <span class="-req">*</span></label> 
                            <select class="form-control form-control-sm select2" name="client" required>
                                <option value="">-- Select --</option>
                                <?php foreach ($this->general_model->getFilteredClients() as $bkey => $bvalue) { ?>
                                    <option value="<?= $bvalue['id'] ?>" <?= selected($ticket['client'],$bvalue['id']) ?>><?= $bvalue['c_id'] ?> - <?= $bvalue['fname'] ?> <?= $bvalue['mname'] ?> <?= $bvalue['lname'] ?> - <?= $bvalue['mobile'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Priority <span class="-req">*</span></label> 
                            <select class="form-control form-control-sm" name="priority">
                                <option value="High" <?= selected($ticket['priority'],'High') ?>>High</option>
                                <option value="Medium" <?= selected($ticket['priority'],'Medium') ?>>Medium</option>
                                <option value="Low" <?= selected($ticket['priority'],'Low') ?>>Low</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Query Description <span class="-req">*</span></label>
                            <textarea name="query" type="text" placeholder="Query Description" class="form-control" value="" required><?= set_value('query',$ticket['query_desc']); ?></textarea>
                            <?= form_error('query') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Close Remarks <span class="-req" style="display: none;" id="closeRemarkReq">*</span></label>
                            <textarea name="closeRemarks" id="closeRemarks" type="text" placeholder="Close Remarks" class="form-control" value=""><?= set_value('closeRemarks',$ticket['close_desc']); ?></textarea>
                            <?= form_error('closeRemarks') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <br><br>
                        <div class="checkbox-fade fade-in-primary d-">
                            <label>
                                <input type="checkbox" value="1" name="closed" id="chkBx">
                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                <span class="text-inverse">Is Closed ?</span>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $ticket['id'] ?>">
                </div>
            </div>

            <div class="card-footer text-right">
                <a href="<?= base_url('ticket/open') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('#chkBx').change(function(event) {
            if(this.checked) {
                $('#closeRemarks').attr('required','required');
                $('#closeRemarkReq').show();
            }else{
                $('#closeRemarks').removeAttr('required');
                $('#closeRemarkReq').hide();
            }
        });
    });
</script>
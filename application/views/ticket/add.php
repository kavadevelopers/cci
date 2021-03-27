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
        <form method="post" action="<?= base_url('ticket/save') ?>">
            <div class="card-block">
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Head <span class="-req">*</span></label> 
                            <select class="form-control form-control-sm select2" name="head" required>
                                <option value="">-- Select Head --</option>
                                <?php foreach ($this->db->get_where('ticket_head',['df' => ''])->result_array() as $tKey => $tvalue) { ?>
                                    <option value="<?= $tvalue['name'] ?>"><?= $tvalue['name'] ?></option>
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
                                    <option value="<?= $bvalue['id'] ?>"><?= $bvalue['c_id'] ?> - <?= $bvalue['fname'] ?> <?= $bvalue['mname'] ?> <?= $bvalue['lname'] ?> - <?= $bvalue['mobile'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Priority <span class="-req">*</span></label> 
                            <select class="form-control form-control-sm" name="priority">
                                <option value="High">High</option>
                                <option value="Medium" selected>Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Query Description <span class="-req">*</span></label>
                            <textarea name="query" type="text" placeholder="Query Description" class="form-control" value="" required><?= set_value('query'); ?></textarea>
                            <?= form_error('query') ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer text-right">
                <a href="<?= base_url('ticket/open') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-plus"></i> Add
                </button>
            </div>
        </form>
    </div>
</div>
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-md-6">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4><?= $_title ?></h4>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-primary btn-mini add-discount"><i class="fa fa-plus"></i> Add</button>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="card">
        <div class="card-block dt-responsive table-responsive">
            <table class="table table-striped table-bordered table-mini table-dt">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Date</th>
                        <th>Customer Name</th>
                        <th class="text-right">Amount</th>
                        <th>Remarks</th>
                        <th class="text-center">Approved</th>
                        <?php if(get_user()['user_type'] == 0){ ?>
                            <th>Created By</th>
                        <?php } ?>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $key => $value) { ?>
                        <?php $client = $this->general_model->_get_client($value['client']); ?>
                        <tr>
                            <td class="text-center"><?= $value['invoice'] ?></td>
                            <td class="text-center" data-sort="<?= _sortdate($value['date']) ?>"><?= vd($value['date']) ?></td>
                            <td>#<?= $client['c_id'] ?> <br><b><?= $client['fname'] ?> <?= $client['mname'] ?> <?= $client['lname'] ?></b> <?= $client['firm'] != ""?'<br>'.$client['firm'] :'' ?> <br><small><?= $client['mobile'] ?></small></td>
                            <td class="text-right"><?= $value['amount'] ?></td>
                            <td><?= nl2br($value['remarks']) ?></td>
                            <td class="text-center">
                                <?php if($value['status'] == 1){ ?>
                                    <span class="pcoded-badge label label-success">Yes</span>
                                <?php }else{ ?>
                                    <span class="pcoded-badge label label-danger">No</span>
                                <?php } ?>
                            </td>
                            <?php if(get_user()['user_type'] == 0){ ?>
                                <td><?= $this->general_model->_get_user($value['created_by'])['name'] ?></td>
                            <?php } ?>
                            <td class="text-center">
                                <?php if(get_user()['user_type'] == 0 && $value['status'] == 1){ ?>
                                    <button class="btn btn-primary btn-mini edit-discount" data-company="<?= $value['company'] ?>" data-id="<?= $value['id'] ?>" data-client="<?= $value['client'] ?>" data-date="<?= vd($value['date']) ?>" data-amount="<?= $value['amount'] ?>" data-remarks="<?= $value['remarks'] ?>" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
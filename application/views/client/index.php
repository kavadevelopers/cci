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
            <?php if(get_user()['user_type'] == "0"){ ?>
                <a class="btn btn-primary btn-sm" href="<?= base_url('client/add') ?>">
                    <i class="fa fa-plus"></i> Add Client
                </a>
            <?php } ?>
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
                        <th>Customer Name</th>
                        <th class="text-center">Contact</th>
                        <th class="text-center">PAN</th>
                        <th class="">Address</th>
                        <?php if(get_user()['user_type'] == 0 || get_user()['user_type'] == 1){ ?>
                            <th class="text-center">Created By</th>
                        <?php } ?>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($client as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $value['c_id'] ?></td>
                            <td>
                                <?= $value['fname'] ?> <?= $value['mname'] ?> <?= $value['lname'] ?>
                                <?php if($value['firm']){ ?>
                                    <br><b>Firm : </b><?= $value['firm'] ?>
                                <?php } ?>
                                <br>-<?= $value['gender'] ?>
                            </td>
                            <td class="text-center">
                                <?php foreach (explode(",", $value['mobile']) as $mkey => $mvalue) { ?>
                                    <?php if($mkey > 0){ ?><br><?php } ?>
                                    <?= $mvalue ?>
                                <?php } ?>
                            </td>
                            <td class="text-center"><?= $value['pan'] ?></td> 
                            <td>
                                <?= $value['add1'] ?>,<br>
                                <?php if(!empty($value['add2'])){ ?><?= $value['add2'] ?>,<br> <?php } ?>
                                <?=  $this->general_model->_get_area($value['area'])['name'] ?>, <?= $this->general_model->_get_city($value['city'])['name'] ?>, <?= $this->general_model->_get_district($value['district'])['name'] ?>, <?= $this->general_model->_get_state($value['state'])['name'] ?> <?= $value['pin'] != ''?",".$value['pin']:''; ?>
                            </td>
                            <?php if(get_user()['user_type'] == 0 || get_user()['user_type'] == 1){ ?>
                                <td class="text-center" data-sort="<?= _sortdate($value['created_at']) ?>">
                                    <?= $this->general_model->_get_user($value['created_by'])['name'] ?>
                                    <p class="text-center"><?= _vdatetime($value['created_at']) ?></p>
                                </td>
                            <?php } ?>
                            <td class="text-center">
                                <a href="<?= base_url('client/view/').$value['id'] ?>" class="btn btn-success btn-mini" title="View">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <?php if(get_user()['user_type'] == 0){ ?>
                                    <a href="<?= base_url('client/edit/').$value['id'] ?>" class="btn btn-primary btn-mini" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?= base_url('client/cancel/').$value['id'] ?>" onclick="return confirm('Are you sure you want to tranfer?')" class="btn btn-danger btn-mini" title="Transfer To Cancel">
                                        <i class="fa fa-ban"></i>
                                    </a>
                                    <a href="<?= base_url('client/in_activate/').$value['id'] ?>" onclick="return confirm('Are you sure you want to tranfer?')" class="btn btn-warning btn-mini" title="Transfer To Inactive">
                                        <i class="fa fa-toggle-off"></i>
                                    </a>
                                    <!-- <a href="<?= base_url('client/delete/').$value['id'] ?>" class="btn btn-danger btn-mini btn-delete" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a> -->
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
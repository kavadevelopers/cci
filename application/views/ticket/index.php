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
            <a href="<?= base_url('ticket/add') ?>" class="btn btn-info btn-sm">
                <i class="fa fa-plus"></i> Add
            </a>
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
                        <th>Client</th>
                        <th class="text-center">Head</th>
                        <th>Desc</th>
                        <th class="text-center">P</th>
                        <th>Timing</th>
                        <th>Owners</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tickets as $key => $value) { ?>
                        <?php $client = $this->general_model->_get_client($value['client']); ?>
                        <tr>
                            <td class="text-center">#<?= $value['ticket'] ?></td>
                            <td>#<?= $client['c_id'] ?> <br><b><?= $client['fname'] ?> <?= $client['mname'] ?> <?= $client['lname'] ?></b> <?= $client['firm'] != ""?'<br>'.$client['firm'] :'' ?> <br><small><?= $client['mobile'] ?></small></td>
                            <td class="text-center"><small><?= $value['head'] ?></small></td>
                            <td>
                                <b>Query : </b> <br><small><?= $value['query_desc'] ?></small>
                                <?php if($value['close_desc'] != "" && $value['close_desc'] != null){ ?>
                                    <br><b>Closed Remarks : </b> <br><small><?= $value['close_desc'] ?>    </small>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php if($value['priority'] == "High"){ ?>
                                    <span class="badge badge-danger"><?= $value['priority'] ?></span>
                                <?php }else if($value['priority'] == "Medium"){ ?>
                                    <span class="badge badge-info"><?= $value['priority'] ?></span>
                                <?php }else{ ?>
                                    <span class="badge badge-success"><?= $value['priority'] ?></span>
                                <?php } ?>
                            </td>
                            <td>
                                <small><b>open : </b><?= _vdatetime($value['openat']) ?></small>
                                <?php if($value['closed'] == '1'){ ?>
                                    <br><small><b>closed : </b><?= _vdatetime($value['closeat']) ?></small>
                                <?php } ?>
                            </td>
                            <td>
                                <small><b>open : </b><?= $this->general_model->_get_user($value['created_by'])['name'] ?></small>
                                <?php if($value['closed'] == '1'){ ?>
                                    <br><small><b>closed : </b><?= $this->general_model->_get_user($value['closed_by'])['name'] ?></small>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php if(get_user()['user_type'] == '0' || get_user()['id'] == $value['created_by'] || get_user()['user_type'] == '3'){ ?>
                                    <a href="<?= base_url('ticket/edit/').$value['id'] ?>" class="btn btn-primary btn-mini">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                <?php } ?>
                                <?php if(get_user()['user_type'] == '0' || get_user()['id'] == $value['created_by'] || (get_user()['user_type'] == '3' && get_user()['type'] == '1')){ ?>
                                    <a href="<?= base_url('ticket/delete/').$value['id'] ?>" class="btn btn-danger btn-mini btn-delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-md-6">
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
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
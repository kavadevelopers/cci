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
                        <th>Service</th>
                        <th class="text-right">Price</th>
                        <th>Client</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Importance</th>
                        <?php if(get_user()['user_type'] == 0 || get_user()['user_type'] == 1){ ?>
                            <th>Owner</th>
                        <?php } ?>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jobs as $key => $value) { ?>
                        <?php $client = $this->general_model->_get_client($value['client']); ?>
                        <tr>
                            <td class="text-center"><?= $value['job_id'] ?></td>
                            <td id="jobService<?= $value['id'] ?>"><?= $this->general_model->_get_service($value['service'])['name'] ?></td>
                            <td class="text-right" id="jobPrice<?= $value['id'] ?>"><?= $value['price'] ?></td>
                            <td><?= $client['fname'] ?> <?= $client['mname'] ?> <?= $client['lname'] ?></td>
                            <td class="text-center" id="status-<?= $value['id'] ?>"><?= getjobStatus($value['status']) ?></td>
                            <td class="text-center" id="jobImportance<?= $value['id'] ?>"><?= $value['importance'] ?></td>
                            <?php if(get_user()['user_type'] == 0 || get_user()['user_type'] == 1){ ?>
                                <td><?= $this->general_model->_get_user($value['owner'])['name'] ?></td>
                            <?php } ?>
                            <td class="text-center">
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
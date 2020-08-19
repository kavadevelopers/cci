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
                        <th class="text-center">Date</th>
                        <th>Name</th>
                        <th>From</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($task as $key => $value) { ?>
                        <tr>
                            <td class="text-center">
                                <?= vd($value['date']) ?>        
                            </td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $this->general_model->_get_user($value['from'])['name'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('task/view/').$value['id'] ?>" class="btn btn-success btn-mini" data-id="<?= $value['id'] ?>" title="View">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
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
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($invoices as $key => $value) { ?>
                        <?php $client = $this->general_model->_get_client($value['client']); ?>
                        <tr>
                            <td class="text-center"><?= $value['inv'] ?></td>
                            <td class="text-center"><?= vd($value['date']) ?></td>
                            <td><?= $client['fname'] ?> <?= $client['mname'] ?> <?= $client['lname'] ?></td>
                            <td class="text-right"><?= $value['total'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('pdf/invoice/').$value['id'] ?>" target="_blank" class="btn btn-primary btn-mini" title="PDF">
                                    <i class="fa fa-file-pdf-o"></i>
                                </a>
                                <a href="<?= base_url('pdf/invoiceD/').$value['id'] ?>" target="_blank" class="btn btn-secondary btn-mini" title="Download PDF">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
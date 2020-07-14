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
        <form method="post" action="<?= base_url('services/update') ?>">
            <div class="card-block">
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Name <span class="-req">*</span></label>
                            <input name="name" type="text" placeholder="Name" class="form-control" value="<?= set_value('name',$service['name']); ?>">
                            <?= form_error('name') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Weightage <span class="-req">*</span></label>
                            <input name="wightage" type="text" placeholder="Weightage" class="form-control numbers" value="<?= set_value('wightage',$service['weight']); ?>">
                            <?= form_error('wightage') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Time To Complete <small>(In Minutes)</small> <span class="-req">*</span></label>
                            <input name="time" type="text" placeholder="Time To Complete" class="form-control numbers" value="<?= set_value('time',$service['time']); ?>">
                            <?= form_error('time') ?>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $service['id'] ?>">
                </div>
            </div>

            <div class="card-footer text-right">
                <a href="<?= base_url('services') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>
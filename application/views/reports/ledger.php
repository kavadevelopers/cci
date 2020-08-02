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
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <form method="post" action="<?= base_url('reports/ledger_result') ?>">
                    <div class="card-block">

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Client <span class="-req">*</span></label>
                                <select class="form-control form-control-sm select2" name="client" required>
                                    <option value="">-- Select --</option>
                                    <?php foreach ($this->general_model->getFilteredClients() as $key => $value) { ?>
                                        <option value="<?= $value['id'] ?>" <?= $value['id'] == $client?'selected':''; ?>><?= $value['c_id'].' - '.$value['fname'].' '.$value['mname'].' '.$value['lname'] ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('client') ?>
                            </div>
                        </div>   

                        <div class="col-md-4">
                            <button class="btn btn-success">
                                <i class="fa fa-eye"></i> Show
                            </button>    
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <?php if($client != ""){ ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-sm" id="sales">
                            <thead>
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th>Particulars</th>
                                    <th class="text-center">Inv No.</th>
                                    <th class="text-right">Debit</th>
                                    <th class="text-right">Credit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $credit_total = 0;$debit_total = 0; ?>
                                <?php foreach($list as $key => $value){ ?>
                                    <tr>
                                        <td class="text-center"><?= vd($value['date']) ?></td>
                                        <th><?= typestring($value['type']) ?></th>
                                        <td class="text-center">
                                            <?= vch_no($value['type'],$value['main']) ?>
                                        </td>
                                        <th class="text-right"><?= ledamtc($value['debit'],$value['credit']) ?></th>
                                        <th class="text-right"><?= ledamtd($value['debit'],$value['credit']) ?></th>
                                    </tr>
                                    <?php $debit_total += tledamtc($value['debit'],$value['credit']); ?>
                                    <?php $credit_total += tledamtd($value['debit'],$value['credit']); ?>
                                <?php } ?>

                                <tr>
                                    <td class="text-right"></td>
                                    <td class="text-right"></td>
                                    <th class="text-right">Total:</th>
                                    <td class="text-right"><?= moneyFormatIndia($debit_total) ?></td>
                                    <td class="text-right"><?= moneyFormatIndia($credit_total) ?></td>
                                </tr>

                                <?php if($credit_total > $debit_total){ ?>
                                    <tr>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                        <th class="text-right">Cr Closing Balance</th>
                                        <th class="text-right"><?= moneyFormatIndia($credit_total - $debit_total) ?></th>
                                        <td class="text-right"></td>
                                    </tr>
                                <?php } ?>

                                <?php if($credit_total < $debit_total){ ?>
                                    <tr>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                        <th class="text-right">Dr Closing Balance</th>
                                        <td class="text-right"></td>
                                        <th class="text-right"><?= moneyFormatIndia($debit_total - $credit_total) ?></th>
                                    </tr>
                                <?php } ?>

                                <tr>
                                    <td class="text-right"></td>
                                    <td class="text-right"></td>
                                    <th class="text-right">Total</td>
                                    <th class="text-right">
                                        <?= max(moneyFormatIndia($debit_total),moneyFormatIndia($credit_total)) ?>
                                    </th>
                                    <th class="text-right">
                                        <?= max(moneyFormatIndia($debit_total),moneyFormatIndia($credit_total)) ?>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>

<script type="text/javascript" language="javascript" >  
 $(function(){ 
    $('#sales').DataTable({
            "paging": false,
           "dom": "<'row'<'col-md-12 my-marD'B>><'row'<'col-md-6'l>>",
           buttons: [ 
                { 
                    extend: 'print',
                    title: '<?= $_title ?>',
                    exportOptions: {
                        columns: [0,1,2,3,4]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?= $_title ?>',
                    exportOptions: {
                        columns: [0,1,2,3,4]
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?= $_title ?>',
                    exportOptions: {
                        columns: [0,1,2,3,4]
                    }
                }
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "columnDefs": [
                { 
                    "orderable": false, 
                    "targets": [0,1,2,3] 
                }
            ] 
        });  
         $('a[target^="_blank"]').click(function() {
            return openWindow(this.href);
        });
    });

  function openWindow(url) {

    if (window.innerWidth <= 640) {
        // if width is smaller then 640px, create a temporary a elm that will open the link in new tab
        var a = document.createElement('a');
        a.setAttribute("href", url);
        a.setAttribute("target", "_blank");

        var dispatch = document.createEvent("HTMLEvents");
        dispatch.initEvent("click", true, true);

        a.dispatchEvent(dispatch);
    }
    else {
        var width = window.innerWidth * 0.66 ;
        // define the height in
        var height = width * window.innerHeight / window.innerWidth ;
        // Ratio the hight to the width as the user screen ratio
        window.open(url , 'newwindow', 'width=' + width + ', height=' + height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2));
    }
    return false;
}
</script>
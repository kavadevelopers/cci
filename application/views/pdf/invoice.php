<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <table style="width:100%">
            <tr>
                <td style="font-size: 20px; text-align: center;">
                   INVOICE
                </td>
            </tr>
        </table>
        <br><br><br>
        <table style="width:100%">
            <tr>
                <td style="font-size: 25px;">
                   <?= $this->general_model->_get_company($invoice['company'])['name'] ?> 
                </td>
                <td align="right">
                    <table  style="width:100%">
                        <tr>
                            <td align="right"><b>Invoice</b> : #<?= $invoice['inv'] ?> </td>
                        </tr>
                        <tr>
                            <td align="right"><b>Date</b> : <?= vd($invoice['date']) ?> </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br><br><br>
        <?php $client = $this->general_model->_get_client($invoice['client']); ?>
        <table style="width:100%">
            <tr>
                <th>
                   <b>From :  </b>
                </th>
                <td align="right">
                    <b>To :  </b>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%">
                        <tr>
                            <td><?= $this->general_model->_get_company($invoice['company'])['name'] ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->general_model->_get_company($invoice['company'])['add1'] ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->general_model->_get_company($invoice['company'])['add2'] ?></td>
                        </tr>
                    </table>
                </td>
                <td align="right">
                    <table style="width: 100%">
                        <tr>
                            <td align="right"><?= $client['fname'].' '.$client['mname'].' '.$client['lname'] ?></td>
                        </tr>
                        <tr>
                            <td align="right"><?= $client['add1'] ?></td>
                        </tr>
                        <tr>
                            <td align="right"><?= $client['add2'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br><br><br>
        <?php $details = $this->db->get_where('invoice_details',['invoice' => $invoice['id']])->result_array(); ?>
        <table style="width: 100%; background-color: #eee; border-bottom: 1px solid #ddd;" cellpadding="5px;">
            <tr>
                <td style="width: 15%; text-align: center;"><b>#</b></td>
                <td style="width: 60%;"><b>Service</b></td>
                <td style="width: 25%; text-align: right;"><b>Amount</b></td>
            </tr>
        </table>

        <?php foreach($details as $key => $value){ ?>
            <table style="width: 100%; border-bottom: 1px solid #ddd;" cellpadding="5px;">
                <tr>
                    <td style="width: 15%; text-align: center;"><b><?= $key + 1 ?></b></td>
                    <td style="width: 60%;"><?= $this->general_model->_get_service($value['service'])['name'] ?></td>
                    <td style="width: 25%; text-align: right;"><?= $value['total'] ?></td>
                </tr>
            </table>
        <?php } ?>

        <table style="width: 100%; background-color: #eee; border-bottom: 1px solid #ddd;" cellpadding="5px;">
            <tr>
                <td style="width: 15%; text-align: center;"></td>
                <td style="width: 60%; text-align: right;"><b>Total : </b></td>
                <td style="width: 25%; text-align: right;">Rs. <?= $invoice['total'] ?></td>
            </tr>
        </table>

    </body>
</html>
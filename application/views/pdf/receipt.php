<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <table style="width:100%">
            <tr>
                <td style="font-size: 20px; text-align: center;">
                   RECEIPT
                </td>
            </tr>
        </table>
        <br>
        <table style="width:100%">
            <tr>
                <td style="font-size: 25px;">
                    
                </td>
                <td align="right">
                    <table  style="width:100%">
                        <tr>
                            <td align="right"><b>Invoice</b> : #<?= $invoice['invoice'] ?> </td>
                        </tr>
                        <tr>
                            <td align="right"><b>Client</b> : #<?= $this->general_model->_get_client($invoice['client'])['c_id'] ?> </td>
                        </tr>
                        <tr>
                            <td align="right"><b>Date</b> : <?= vd($invoice['date']) ?> </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br><br>
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
                            <td style="font-size: 10px;"><?= $this->general_model->_get_company($invoice['company'])['add1'] ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;"><?= $this->general_model->_get_company($invoice['company'])['add2'] ?></td>
                        </tr>
                    </table>
                </td>
                <td align="right">
                    <table style="width: 100%">
                        <tr>
                            <td align="right"><?= $client['fname'].' '.$client['mname'].' '.$client['lname'] ?></td>
                        </tr>
                        <tr>
                            <td align="right" style="font-size: 10px;"><?= $client['add1'] ?></td>
                        </tr>
                        <tr>
                            <td align="right" style="font-size: 10px;"><?= $client['add2'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br><br>
        
        <table style="width: 100%; background-color: #6e6e6e; color: #fff; border-bottom: 1px solid #ddd;" cellpadding="5px;">
            <tr>
                <td style="width: 15%; text-align: center;"><b>SN</b></td>
                <td style="width: 60%;"><b>Particulars</b></td>
                <td style="width: 25%; text-align: right;"><b>Total</b></td>
            </tr>
        </table>

        <table style="width: 100%; border-bottom: 1px solid #ddd;" cellpadding="5px;">
            <tr>
                <td style="width: 15%; text-align: center;">1</td>
                <td style="width: 60%;">Amount Paid(<?= $invoice['pay_type'] ?> - <?= $invoice['pay_remarks'] ?>)</td>
                <td style="width: 25%; text-align: right;"><?= $invoice['amount'] ?></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        
        <table style="width: 100%; background-color: #6e6e6e; color: #fff; border-bottom: 1px solid #ddd;" cellpadding="5px;">
            <tr>
                <td style="width: 15%; text-align: center;"></td>
                <td style="width: 60%; text-align: right;">Total : </td>
                <td style="width: 25%; text-align: right;"><b>Rs. <?= $invoice['amount'] ?></b></td>
            </tr>
        </table>
  

        <br><br>

        <?php if(!empty($invoice['remarks'])){ ?>
            <table style="width: 100%; border-bottom: 1px solid #ddd;">
                <tr>
                    <td style="font-size: 12px;">Remarks</td>
                </tr>
                <tr>
                    <td style="font-size: 10px;">
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    <?= $invoice['remarks'] ?>            
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
            <br><br>
        <?php } ?>

        <table style="width: 100%">
            <tr>
                <td style="text-align: right;">
                    <b>For, <?= $this->general_model->_get_company($invoice['company'])['name'] ?></b>
                </td>
            </tr>
        </table>
    </body>
</html>
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

        	<div class="row">
        		<div class="col-md-12">
        			<ul class="nav nav-tabs tabs" role="tablist" >
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#basicTab" role="tab">Basic Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profileTab" role="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#addInfoTab" role="tab">Additional Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#invoiceTab" role="tab">Invoices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#paymentsTab" role="tab">Payments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#activeJobTab" role="tab">Active Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#jobHistoryTab" role="tab">Job History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#docTab" role="tab">Documents</a>
                        </li>
                    </ul>
                    <div class="tab-content tabs card-block">
                    	<div class="tab-pane active" id="basicTab" role="tabpanel">
	                        <div class="row">
	                        	<div class="col-md-6">
	                        		<div class="table-responsive">
                                        <table class="table m-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Full Name</th>
                                                    <td><?= $client['fname'] .' '.$client['mname'].' '.$client['lname'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Firm Name</th>
                                                    <td><?= $client['firm'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Mobile</th>
                                                    <td><?= $client['mobile'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td><?= $client['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Address Line-1</th>
                                                    <td><?= $client['add1'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Address Line-2</th>
                                                    <td><?= $client['add2'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Area</th>
                                                    <td><?= $this->general_model->_get_area($client['area'])['name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">City</th>
                                                    <td><?= $this->general_model->_get_city($client['city'])['name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">State</th>
                                                    <td><?= $this->general_model->_get_state($client['state'])['name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Pin</th>
                                                    <td><?= $client['pin'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
	                        	</div>
	                        	<div class="col-md-6">
	                        		<div class="table-responsive">
                                        <table class="table m-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">PAN</th>
                                                    <td><?= $client['pan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Gender</th>
                                                    <td><?= $client['gender'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Birth Date</th>
                                                    <td><?= date('F d Y',strtotime($client['dob'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Language</th>
                                                    <td><?= $client['language'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Prefer Time To Call</th>
                                                    <td><?= $client['time_to_call'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Health Insurance</th>
                                                    <td><?= $client['health_in'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Life Insurance</th>
                                                    <td><?= $client['life_in'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">ITR CLIENT</th>
                                                    <td><?= $client['itr_client'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">GST CLIENT</th>
                                                    <td><?= $client['gst_client'] ?> <?= $client['gst_type'] != ""?"- ".$client['gst_type']:''; ?><?= $client['month_quater'] != ""?" - ".$client['month_quater']:''; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
	                        	</div>
	                        </div>
	                    </div>


	                    <div class="tab-pane" id="profileTab" role="tabpanel">
	                        <div class="row">
	                        	<div class="col-md-6">
	                        		<div class="table-responsive">
                                        <table class="table m-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Occupation</th>
                                                    <td><?= $client['occupation'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Industry</th>
                                                    <td><?= $this->general_model->_get_industry($client['industry'])['name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Sub Industry</th>
                                                    <td><?= $this->general_model->_get_subindustry($client['sub_industry'])['name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Industry Remarks</th>
                                                    <td><?= nl2br($client['ind_remarks']) ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
	                        	</div>
	                        	<div class="col-md-6">
	                        		<div class="table-responsive">
                                        <table class="table m-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Profile Introduction</th>
                                                    <td><?= $client['profile_intro'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Actual Turnover & Stock & Other</th>
                                                    <td><?= $client['turnover_notes'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
	                        	</div>
	                        </div>
	                    </div>

	                    <div class="tab-pane" id="invoiceTab" role="tabpanel">
	                        <div class="row">
	                        	<div class="col-md-12">
	                        		<div class="table-responsive">
                                        <?php $invoices = $this->db->order_by('date','desc')->get_where('invoice',['client' => $client['id']])->result_array(); ?>
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
							                        <?php $nclient = $this->general_model->_get_client($value['client']); ?>
							                        <tr>
							                            <td class="text-center"><?= $value['inv'] ?></td>
							                            <td class="text-center"><?= vd($value['date']) ?></td>
							                            <td><?= $nclient['fname'] ?> <?= $nclient['mname'] ?> <?= $nclient['lname'] ?></td>
							                            <td class="text-right"><?= $value['total'] ?></td>
							                            <td class="text-center">
							                                <a href="<?= base_url('pdf/invoice/').$value['id'] ?>" target="_blank" class="btn btn-primary btn-mini" title="PDF">
							                                    <i class="fa fa-file-pdf-o"></i>
							                                </a>
							                            </td>
							                        </tr>
							                    <?php } ?>
							                </tbody>
							            </table>
                                    </div>
	                        	</div>
	                        </div>
	                    </div>

	                    <div class="tab-pane" id="paymentsTab" role="tabpanel">
	                        <div class="row">
	                        	<div class="col-md-12">
	                        		<div class="table-responsive">
                                        <?php $invoices = $this->db->order_by('date','desc')->get_where('payment',['client' => $client['id']])->result_array(); ?>
                                        <table class="table table-striped table-bordered table-mini table-dt">
							                <thead>
							                    <tr>
							                        <th class="text-center">#</th>
							                        <th class="text-center">Date</th>
							                        <th>Customer Name</th>
							                        <th class="text-right">Amount</th>
							                        <th>Remarks</th>
							                        <th class="text-center">Approved</th>
							                        <?php if(get_user()['user_type'] == 0){ ?>
							                            <th>Payment By</th>
							                        <?php } ?>
							                        <th class="text-center">Action</th>
							                    </tr>
							                </thead>
							                <tbody>
							                    <?php foreach ($invoices as $key => $value) { ?>
							                        <?php $nclient = $this->general_model->_get_client($value['client']); ?>
							                        <tr>
							                            <td class="text-center"><?= $value['invoice'] ?></td>
							                            <td class="text-center"><?= vd($value['date']) ?></td>
							                            <td><?= $nclient['fname'] ?> <?= $nclient['mname'] ?> <?= $nclient['lname'] ?></td>
							                            <td class="text-right"><?= $value['amount'] ?></td>
							                            <td><?= nl2br($value['remarks']) ?></td>
							                            <td class="text-center">
							                                <?php if($value['status'] == 1){ ?>
							                                    <span class="pcoded-badge label label-success">Yes</span>
							                                <?php }else{ ?>
							                                    <span class="pcoded-badge label label-danger">No</span>
							                                <?php } ?>
							                            </td>
							                            <?php if(get_user()['user_type'] == 0){ ?>
							                                <td><?= $this->general_model->_get_user($value['created_by'])['name'] ?></td>
							                            <?php } ?>
							                            <td class="text-center">
							                                <a href="<?= base_url('pdf/receipt/').$value['id'] ?>" target="_blank" class="btn btn-primary btn-mini" title="PDF">
							                                    <i class="fa fa-file-pdf-o"></i>
							                                </a>
							                            </td>
							                        </tr>
							                    <?php } ?>
							                </tbody>
							            </table>
                                    </div>
	                        	</div>
	                        </div>
	                    </div>

	                    <div class="tab-pane" id="activeJobTab" role="tabpanel">
	                        <div class="row">
	                        	<div class="col-md-12">
	                        		<div class="table-responsive">

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
							                	<?php $jobs = $this->db->get_where('job',['status <' => 3,'client' => $client['id']])->result_array(); ?>
							                    <?php foreach ($jobs as $key => $value) { ?>
							                        <?php $nclient = $this->general_model->_get_client($value['client']); ?>
							                        <tr>
							                            <td class="text-center"><?= $value['job_id'] ?></td>
							                            <td id="jobService<?= $value['id'] ?>"><?= $this->general_model->_get_service($value['service'])['name'] ?></td>
							                            <td class="text-right" id="jobPrice<?= $value['id'] ?>"><?= $value['price'] ?></td>
							                            <td><?= $nclient['fname'] ?> <?= $nclient['mname'] ?> <?= $nclient['lname'] ?></td>
							                            <td class="text-center" id="status-<?= $value['id'] ?>"><?= getjobStatus($value['status']) ?></td>
							                            <td class="text-center" id="jobImportance<?= $value['id'] ?>"><?= $value['importance'] ?></td>
							                            <td><?= $this->general_model->_get_user($value['owner'])['name'] ?></td>
							                            <td class="text-center">
							                                <button class="btn btn-primary btn-mini edit-job" title="Edit" data-importance="<?= $value['importance'] ?>" data-job="<?= $value['id'] ?>" data-service="<?= $value['service'] ?>" data-price="<?= $value['price'] ?>" data-job_id="<?= $value['job_id'] ?>" data-client="<?= $nclient['fname'] ?> <?= $nclient['mname'] ?> <?= $nclient['lname'] ?>">
							                                    <i class="fa fa-pencil"></i>
							                                </button>
							                                <button type="button" class="btn btn-success btn-mini add-job-followup" data-status="<?= $value['status'] ?>" data-id="<?= $value['id'] ?>" data-stop="Job Is Closed" data-type="job" title="Check Followup">
							                                    <i class="fa fa-question"></i>
							                                </button>
							                            </td>
							                        </tr>
							                    <?php } ?>
							                </tbody>
							            </table>

	                        		</div>
	                        	</div>
	                        </div>
	                    </div>

	                    <div class="tab-pane" id="jobHistoryTab" role="tabpanel">
	                        <div class="row">
	                        	<div class="col-md-12">
	                        		<div class="table-responsive">

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
							                	<?php $jobs = $this->db->get_where('job',['status >=' => 3,'client' => $client['id']])->result_array(); ?>
							                    <?php foreach ($jobs as $key => $value) { ?>
							                        <?php $nclient = $this->general_model->_get_client($value['client']); ?>
							                        <tr>
							                            <td class="text-center"><?= $value['job_id'] ?></td>
							                            <td><?= $this->general_model->_get_service($value['service'])['name'] ?></td>
							                            <td class="text-right"><?= $value['price'] ?></td>
							                            <td><?= $nclient['fname'] ?> <?= $nclient['mname'] ?> <?= $nclient['lname'] ?></td>
							                            <td class="text-center" id="status-<?= $value['id'] ?>"><?= getjobStatus($value['status']) ?></td>
							                            <td class="text-center"><?= $value['importance'] ?></td>
							                            <td><?= $this->general_model->_get_user($value['owner'])['name'] ?></td>
							                            <td class="text-center">
							                                <button type="button" class="btn btn-success btn-mini add-job-followup" data-status="<?= $value['status'] ?>" data-id="<?= $value['id'] ?>" data-stop="Job Is Closed" data-type="job" title="Check Followup">
							                                    <i class="fa fa-question"></i>
							                                </button>
							                            </td>
							                        </tr>
							                    <?php } ?>
							                </tbody>
							            </table>

	                        		</div>
	                        	</div>
	                        </div>
	                    </div>

	                    <div class="tab-pane" id="docTab" role="tabpanel">
	                        <div class="row">
	                        	<div class="col-md-12">
	                        		<div class="table-responsive">

                                        

	                        		</div>
	                        	</div>
	                        </div>
	                    </div>

	                    <div class="tab-pane" id="addInfoTab" role="tabpanel">
	                        <div class="row">
	                        	<div class="col-md-12">
	                        		<div class="table-responsive">

	                        			<table class="table m-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Group ID : <?= $client['group'] ?></th>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <form type="post" id="addGroupForm">
	                                        <table class="table table-striped table-bordered table-mini">
								                <thead>
								                    <tr>
								                        <th class="text-center">#</th>
								                        <th>Name</th>
								                        <th class="text-center">Relation</th>
								                        <th class="text-center">Client Id</th>
								                        <th>Remarks</th>
								                    </tr>
								                </thead>
								                <tbody id="addGroupTbody">
								                	<?php $group = $this->db->get_where('grouping',['main' => $client['id']])->result_array(); ?>
								                    <?php foreach ($group as $key => $value) { ?>
								                    	<?php $nclient = $this->general_model->_get_client($value['child']); ?>
									                	<tr>
									                		<td class="text-center"><?= $client['group'] ?></td>
									                		<td><?= $nclient['fname'].' '.$nclient['mname'].' '.$nclient['lname'] ?></td>
									                		<td class="text-center"><?= $value['relation'] ?></td>
									                		<td class="text-center"><?= $nclient['c_id'] ?></td>
									                		<td><?= nl2br($value['remarks']) ?></td>
									                	</tr>
								                	<?php } ?>
								                </tbody>
								                <tfoot>
								                	<tr>
								                		<td>
								                			<input type="text" name="" class="form-control" value="<?= $client['group'] ?>" readonly>
								                			<input type="hidden" id="addGroupChild" class="form-control" value="<?= $client['id'] ?>" readonly>
								                		</td>
								                		<td>
								                			<select class="form-control form-control-sm select2" id="addGroupMain" required>
							                                    <option value="">-- Select Child Client--</option>
							                                    <?php foreach ($this->general_model->getFilteredClients() as $bkey => $bvalue) { ?>
							                                        <option value="<?= $bvalue['id'] ?>"><?= $bvalue['fname'] ?> <?= $bvalue['mname'] ?> <?= $bvalue['lname'] ?> - <?= $bvalue['mobile'] ?></option>
							                                    <?php } ?>
							                                </select>
								                		</td>
								                		<td>
								                			<input type="text" id="addGroupRelation" class="form-control" placeholder="Relation" value=""  required>
								                		</td>
								                		<td>
								                			<textarea class="form-control" id="addGroupRemarks" placeholder="remarks"></textarea>
								                		</td>
								                		<td>
								                			<button class="btn btn-mini btn-success" type="submit" id="addGroupSubmitBtn"><i class="fa fa-plus"></i></button>
								                		</td>
								                	</tr>
								                </tfoot>
								            </table>
							            </form>
	                        		</div>
	                        	</div>
	                        </div>
	                    </div>

                    </div>
        		</div>
        	</div>

    	</div>
    </div>
</div>


<script type="text/javascript">

	$(document).on('click','.nav-item', function(){
		$('.tab-pane').removeClass('active');
		$('#'+$(this).children('.nav-link').attr('href').substr(1)).addClass('active');
	});
</script>



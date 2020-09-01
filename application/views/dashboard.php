<div class="page-header">
    <div class="row align-items-end">
        <div class="col-md-12 text-right">
            <div class="page-header-title ">
            	<?php if(get_user()['user_type'] != '3'){ ?>
               		<button type="button" class="btn btn-warning btn-mini" data-toggle="modal" data-target="#dueDateModal">Due Dates</button>
               	<?php } ?>
            </div>
        </div>
    </div>
</div>


<div class="page-body">
	<?php if(get_user()['user_type'] == '3'){ ?>
	   	<div class="row">
	   		<div class="col-md-6 col-xl-3">
                <div class="card user-widget-card bg-c-green">
                    <div class="card-block">
                        <i class="feather icon-file-text bg-simple-c-green card1-icon"></i>
                        <h4><?= $this->db->get_where('leads',['df' => '','owner'   => get_user()['id'] ,'date >=' => date("Y-m-1"),'date <=' => date("Y-m-t")])->num_rows(); ?></h4>
                        <p>Total Leads</p>
                        <a href="<?= base_url('leads') ?>" class="more-info">More Info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card user-widget-card bg-c-yellow">
                    <div class="card-block">
                        <i class="feather icon-file-text bg-simple-c-yellow card1-icon"></i>
                        <h4><?= $this->db->get_where('leads',['df' => '','status !=' => '0','owner'    => get_user()['id'],'date >=' => date("Y-m-1"),'date <=' => date("Y-m-t")])->num_rows(); ?></h4>
                        <p>Converted Leads</p>
                        <a href="<?= base_url('leads/converted_leads') ?>" class="more-info">More Info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="card">
	            	<div class="card-header" style="padding: 10px;">
	   					<div class="row"> 
		                    <div class="col-md-6">
		                    	<h5>Top 5 Services Sold</h5>
		                    </div>
				        </div>
	                </div>
	                <div class="card-block" style="height: 100px; overflow-y: scroll;">

	                </div>
            	</div>
            </div>
	   	</div>
	<?php } ?>
	<?php if(get_user()['user_type'] == '0'){ ?>

   		<div class="row">
   			<div class="col-md-3">
				<div class="card text-center text-white bg-c-green">
					<div class="card-block">
						<h6 class="m-b-0">Leads in this Month</h6>
						<h4 class="m-t-10 m-b-10"><?= $this->db->get_where('leads',['df' => '','date >=' => date("Y-m-1"),'date <=' => date("Y-m-t")])->num_rows(); ?></h4>
						<p class="m-b-0">Total Leads - <?= $this->db->get_where('leads',['df' => ''])->num_rows(); ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card text-center text-white bg-c-yellow">
					<div class="card-block">
						<h6 class="m-b-0">New Client</h6>
						<h4 class="m-t-10 m-b-10"><?= $this->general_model->newClientsNumAmount()[0]; ?></h4>
						<p class="m-b-0"><?= rs().moneyFormatIndia($this->general_model->newClientsNumAmount()[1]) ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card text-center text-white bg-c-lite-green">
					<div class="card-block">
						<h6 class="m-b-0">More than 30 Days Payment</h6>
						<h4 class="m-t-10 m-b-10"><?= rs().moneyFormatIndia($this->general_model->pastThDaysPendingPayment()); ?></h4>
						<p class="m-b-0">-</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card text-center text-white bg-c-lite-green">
					<div class="card-block">
						<h6 class="m-b-0">Total Payment Pending</h6>
						<h4 class="m-t-10 m-b-10"><?= rs().moneyFormatIndia($this->general_model->pastDaysPendingPayment()); ?></h4>
						<p class="m-b-0">-</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card text-center text-white bg-c-lite-green">
					<div class="card-block">
						<h6 class="m-b-0">Pending For Invoice</h6>
						<h4 class="m-t-10 m-b-10"><?= $this->general_model->pendingForPaymentClient(); ?> Clients</h4>
						<p class="m-b-0">-</p>
					</div>
				</div>
			</div>
   		</div>

   	<?php } ?>		
   	<div class="row">
   		<div class="col-md-6">
   			<div class="card">
   				<div class="card-header">
   					<div class="row"> 
	                    <div class="col-md-6">
	                    	<h5>To Do List</h5>
	                    </div>
	                    <div class="col-md-6 text-right">
				            <button class="btn btn-primary btn-sm" type="button" id="addTodo">
				                <i class="fa fa-plus"></i> Add
				            </button>
				        </div>
			        </div>
                </div>
                <div class="card-block" style="max-height: 500px; overflow-y: scroll;">
                	<table class="table table-striped table-bordered table-mini table-ndt">
		                <thead>
		                    <tr>
		                        <th class="text-center">Date</th>
		                        <th>Remarks</th> 
		                        <th class="text-center">Action</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php foreach ($todo as $key => $value) { ?>
		                        <tr>
		                            <td class="text-center">
		                            	<?= vd($value['date']) ?>
		                            	<?= get_from_to($value['ftime'],$value['ttime']) ?>        
		                            </td>
		                            <td><?= nl2br($value['remarks']) ?></td>
		                            <td class="text-center">
		                                <button class="btn btn-danger btn-mini btn-delete delete-todo" data-id="<?= $value['id'] ?>" title="Delete">
		                                    <i class="fa fa-trash"></i>
		                                </button>
		                            </td>
		                        </tr>
		                    <?php } ?>
		                </tbody>
		            </table>
                </div>
   			</div>
   		</div>
   		<div class="col-md-6">
        	<div class="card">
            	<div class="card-header" style="padding: 10px;">
   					<div class="row"> 
	                    <div class="col-md-6">
	                    	<h5>Panding For Approval Receipt</h5>
	                    </div>
			        </div>
                </div>
                <div class="card-block table-responsive">
                	<table class="table table-striped table-bordered table-mini table-dt">
		                <thead>
		                    <tr>
		                    	<th class="text-center">Action</th>
		                        <th class="text-center">Date</th>
		                        <th>Customer Name</th>
		                        <th class="text-right">Amount</th>
		                        <th>Remarks</th>
		                        <?php if(get_user()['user_type'] == 0){ ?>
		                            <th>Payment By</th>
		                        <?php } ?>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php foreach ($receipt_request as $key => $value) { ?>
		                        <?php $client = $this->general_model->_get_client($value['client']); ?>
		                        <tr>
		                        	<td class="text-center">
		                                <button class="btn btn-success btn-mini approve-payment" data-id="<?= $value['id'] ?>" title="Approve">
		                                    <i class="fa fa-check"></i>
		                                </button>
		                            </td>
		                            <td class="text-center"><?= vd($value['date']) ?></td>
		                            <td><?= $client['fname'] ?> <?= $client['mname'] ?> <?= $client['lname'] ?></td>
		                            <td class="text-right"><?= $value['amount'] ?></td>
		                            <td><?= nl2br($value['remarks']) ?></td>
		                            <?php if(get_user()['user_type'] == 0){ ?>
		                                <td><?= $this->general_model->_get_user($value['created_by'])['name'] ?></td>
		                            <?php } ?>
		                        </tr>
		                    <?php } ?>
		                </tbody>
		            </table>
                </div>
        	</div>
        </div>
   		<div class="col-md-12">
   			<div class="row">
            	<div class="col-md-6">
            		<div class="card">
            			<div class="card-header">
		   					<div class="row"> 
			                    <div class="col-md-6">
			                    	<h5>My Task</h5>
			                    </div>
					        </div>
		                </div>
		                <div class="card-block dt-responsive table-responsive">
		                    <table class="table table-striped table-bordered table-mini table-dt">
		                        <thead>
		                            <tr>
		                                <th class="text-center">Action</th>
		                                <th class="text-center">Date</th>
		                                <th class="text-center">New Reply</th>
		                                <th>Particulars</th>
		                                <th>From</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            <?php foreach ($my_task as $key => $value) { ?>
		                                <tr>
		                                	<td class="text-center">
		                                        <a href="<?= base_url('task/view/').$value['id'] ?>" class="btn btn-success btn-mini" data-id="<?= $value['id'] ?>" title="View">
		                                            <i class="fa fa-eye"></i>
		                                        </a>
		                                    </td>
		                                    <td class="text-center">
		                                        <?= vd($value['date']) ?>        
		                                    </td>
		                                    <td class="text-center">
		                                    	<span class="pcoded-badge label label-danger">
				                            		<?php $coReply = $this->db->get_where('task_reply',['to' => get_user()['id'],'read' => '0','task' => $value['id']])->num_rows(); ?>
		                                            <?php 
		                                            	if($coReply > 9){
		                                            		echo "9+";
		                                            	}else{
		                                            		echo $coReply;
		                                            	}
		                                            ?>
		                                        </span>
		                                    </td>
		                                    <td class="td-big"><?= $value['name'] ?></td>
		                                    <td><?= $this->general_model->_get_user($value['from'])['name'] ?></td>
		                                </tr>
		                            <?php } ?>
		                        </tbody>
		                    </table>
		                </div>
		            </div>
            	</div>
            	<div class="col-md-6">
            		<div class="card">
            			<div class="card-header">
		   					<div class="row"> 
			                    <div class="col-md-6">
			                    	<h5>Other Task</h5>
			                    </div>
					        </div>
		                </div>
		                <div class="card-block dt-responsive table-responsive">
		                    <table class="table table-striped table-bordered table-mini table-dt">
		                        <thead>
		                            <tr>
		                                <th class="text-center">Action</th>
		                                <th class="text-center">Date</th>
		                                <th class="text-center">New Reply</th>
		                                <th>Particulars</th>
		                                <th>To</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            <?php foreach ($other_task as $key => $value) { ?>
		                                <tr>
		                                	<td class="text-center">
		                                        <a href="<?= base_url('task/view/').$value['id'] ?>" class="btn btn-success btn-mini" data-id="<?= $value['id'] ?>" title="View">
		                                            <i class="fa fa-eye"></i>
		                                        </a>
		                                    </td>
		                                    <td class="text-center">
		                                        <?= vd($value['date']) ?>        
		                                    </td>
		                                    <td class="text-center">
		                                    	<span class="pcoded-badge label label-danger">
				                            		<?php $coReply = $this->db->get_where('task_reply',['to' => get_user()['id'],'read' => '0','task' => $value['id']])->num_rows(); ?>
		                                            <?php 
		                                            	if($coReply > 9){
		                                            		echo "9+";
		                                            	}else{
		                                            		echo $coReply;
		                                            	}
		                                            ?>
		                                        </span>
		                                    </td>
		                                    <td class="td-big"><?= $value['name'] ?></td>
		                                    <td><?= $this->general_model->_get_user($value['to'])['name'] ?></td>
		                                </tr>
		                            <?php } ?>
		                        </tbody>
		                    </table>
		                </div>
		            </div>
            	</div>
            </div>
   		</div>
	   		<?php if(get_user()['user_type'] == '0'){ ?>

	   	<div class="col-md-6">
	   		<div class="card">
            	<div class="card-header" style="padding: 10px;">
   					<div class="row"> 
	                    <div class="col-md-6">
	                    	<h5>Leads By Sales Person</h5>
	                    </div>
			        </div>
                </div>
                <div class="card-block table-responsive">
                	<table class="table table-striped table-bordered table-mini table-ndt">
                		<thead>
                			<tr>
		                        <th>Name</th>
		                        <th class="text-center">Today</th>
		                        <th class="text-center">This Month</th>
		                        <th class="text-center">Total Active</th>
		                        <th class="text-center">Total Converted</th>
		                        <th class="text-center">Total Dump</th>
		                        <th class="text-center">Total</th>
		                    </tr>
                		</thead>
                		<tbody>
                			<?php foreach ($this->db->order_by('type','desc')->get_where('user',['user_type' => '3'])->result_array() as $key => $value) { ?>
                				<tr>
	                				<td><?= $value['name'] ?><br><small>-<?= _user_type($value['id']) ?></small></td>
	                				<td class="text-center"><?= $this->general_model->getUserLeadByRange($value['id'],'today'); ?></td>
	                				<td class="text-center"><?= $this->general_model->getUserLeadByRange($value['id'],'month'); ?></td>
	                				<td class="text-center"><?= $this->general_model->getUserLeadByRange($value['id'],'total_active'); ?></td>
	                				<td class="text-center"><?= $this->general_model->getUserLeadByRange($value['id'],'total_converted'); ?></td>
	                				<td class="text-center"><?= $this->general_model->getUserLeadByRange($value['id'],'total_dump'); ?></td>
	                				<td class="text-center"><?= $this->general_model->getUserLeadByRange($value['id'],''); ?></td>
	                			</tr>
                			<?php } ?>
                		</tbody>
                	</table>
                </div>
            </div>
	   	</div>
	   	<div class="col-md-6">
	   		<div class="card">
            	<div class="card-header" style="padding: 10px;">
   					<div class="row"> 
	                    <div class="col-md-6">
	                    	<h5>Leads By Source</h5>
	                    </div>
			        </div>
                </div>
                <div class="card-block table-responsive">
                	<table class="table table-striped table-bordered table-mini table-ndt">
                		<thead>
                			<tr>
		                        <th>Source Name</th>
		                        <th class="text-center">Today</th>
		                        <th class="text-center">This Month</th>
		                        <th class="text-center">Total Active</th>
		                        <th class="text-center">Total Converted</th>
		                        <th class="text-center">Total Dump</th>
		                        <th class="text-center">Total</th>
		                    </tr>
                		</thead>
                		<tbody>
                			<?php foreach ($this->db->order_by('id','desc')->get_where('source',['df' => ''])->result_array() as $key => $value) { ?>
                				<tr>
	                				<td><?= $value['name'] ?></td>
	                				<td class="text-center"><?= $this->general_model->getSourceLeadByRange($value['id'],'today'); ?></td>
	                				<td class="text-center"><?= $this->general_model->getSourceLeadByRange($value['id'],'month'); ?></td>
	                				<td class="text-center"><?= $this->general_model->getSourceLeadByRange($value['id'],'total_active'); ?></td>
	                				<td class="text-center"><?= $this->general_model->getSourceLeadByRange($value['id'],'total_converted'); ?></td>
	                				<td class="text-center"><?= $this->general_model->getSourceLeadByRange($value['id'],'total_dump'); ?></td>
	                				<td class="text-center"><?= $this->general_model->getSourceLeadByRange($value['id'],''); ?></td>
	                			</tr>
                			<?php } ?>
                		</tbody>
                	</table>
                </div>
            </div>
	   	</div>
	   	
   		

	   	<?php } ?>	
   	</div>

   	

   	
</div>





<div class="page-body">


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
                	<table class="table table-striped table-bordered table-mini">
		                <thead>
		                    <tr>
		                        <th class="text-center">Date</th>
		                        <th>Remarks</th>
		                        <th>For</th>
		                        <th>From</th>
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
		                            <td><?= $this->general_model->_get_user($value['to'])['name'] ?></td>
		                            <td><?= $this->general_model->_get_user($value['from'])['name'] ?></td>
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
   	</div>
	
</div>





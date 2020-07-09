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
        <form method="post" action="<?= base_url('leads/update') ?>">
            <div class="card-block">
                <div class="row">

                	<div class="col-md-3">
                        <div class="form-group">
                            <label>Date <span class="-req">*</span></label> 
                            <input name="date" type="text" placeholder="Date" class="form-control form-control-sm datepicker" value="<?= set_value('date',vd($lead['date'])); ?>" readonly>
                            <?= form_error('date') ?>
                        </div>
                    </div>
                    <?php if(get_user()['user_type'] == "0"){ ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Branch <span class="-req">*</span></label> 
                                <select class="form-control form-control-sm select2" name="branch" required>
                                	<option value="">-- Select Branch --</option>
                                	<?php foreach ($this->general_model->get_branches() as $bkey => $bvalue) { ?>
                                		<option value="<?= $bvalue['id'] ?>" <?= selected($lead['branch'],$bvalue['id']) ?>><?= $bvalue['name'] ?></option>
                                	<?php } ?>
                                </select>
                                <?= form_error('branch') ?>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <input type="hidden" name="branch" value="<?= get_user()['branch'] ?>">
                    <?php } ?>

                    <?php if(get_user()['user_type'] == "0" || get_user()['user_type'] == "1"){ ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Lead Owner <span class="-req">*</span></label> 
                                <select class="form-control form-control-sm select2" name="owner" required>
                                    <option value="">-- Select --</option>
                                    <?php foreach ($this->general_model->get_lead_owners() as $bkey => $bvalue) { ?>
                                        <option value="<?= $bvalue['id'] ?>" <?= selected($lead['owner'],$bvalue['id']) ?>>
                                            <?= $bvalue['name'] ?> - <?= getRole($bvalue['user_type']) ?>        
                                        </option>
                                    <?php } ?>
                                </select>
                                <?= form_error('owner') ?>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <input type="hidden" name="owner" value="<?= get_user()['id'] ?>">
                    <?php } ?>     

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Customer Name<span class="-req">*</span></label> 
                            <input name="name" type="text" placeholder="Customer Name" class="form-control form-control-sm" value="<?= set_value('name',$lead['customer']); ?>" required>
                            <?= form_error('name') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Firm Name</label> 
                            <input name="firm" type="text" placeholder="Firm Name" class="form-control form-control-sm" value="<?= set_value('firm',$lead['firm']); ?>">
                            <?= form_error('firm') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>State <span class="-req">*</span></label> 
                            <select class="form-control form-control-sm select2" name="state" required>
                            	<option value="">-- Select State --</option>
                            	<?php foreach ($this->general_model->get_states() as $skey => $svalue) { ?>
                            		<option value="<?= $svalue['id'] ?>" <?= selected($lead['state'],$svalue['id']) ?>><?= $svalue['name'] ?></option>
                            	<?php } ?>
                            </select>
                            <?= form_error('state') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>City <span class="-req">*</span></label> 
                            <select class="form-control form-control-sm select2" name="city" required>
                            	<option value="">-- Select City --</option>
                            	<?php foreach ($this->general_model->get_cities() as $ckey => $cvalue) { ?>
                            		<option value="<?= $cvalue['id'] ?>" <?= selected($lead['city'],$cvalue['id']) ?>><?= $cvalue['name'] ?></option>
                            	<?php } ?>
                            </select>
                            <?= form_error('city') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Area <span class="-req">*</span></label> 
                            <select class="form-control form-control-sm select2" name="area" required>
                            	<option value="">-- Select Area --</option>
                            	<?php foreach ($this->general_model->get_areas() as $akey => $avalue) { ?>
                            		<option value="<?= $avalue['id'] ?>" <?= selected($lead['area'],$avalue['id']) ?>><?= $avalue['name'] ?></option>
                            	<?php } ?>
                            </select>
                            <?= form_error('area') ?>
                        </div>
                    </div>


                    <div class="col-md-12">
	                    <div class="row">

	                    	<div class="col-md-3">
		                        <div class="form-group">
		                            <label>Mobile</label> 
		                            <div class="mobile-body">
                                        <?php foreach (explode(',', $lead['mobile']) as $key => $value) { ?>
                                            <input type="text" name="mobile[]" class="form-control form-control-sm numbers mobile-key-up m-t2" autocomplete="off" maxlength="10" placeholder="Mobile" value="<?= $value ?>">       
                                        <?php } ?>
		                            	<input type="text" name="mobile[]" class="form-control form-control-sm numbers mobile-key-up m-t2" autocomplete="off" maxlength="10" placeholder="Mobile">	
		                            </div>
		                        </div>
		                    </div>
							
		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Email</label> 
		                            <div class="email-body">
                                        <?php foreach (explode(',', $lead['email']) as $key => $value) { ?>
                                            <input type="email" name="email[]" class="form-control form-control-sm email-key-up m-t2" placeholder="Email" autocomplete="off" value="<?= $value ?>">
                                        <?php } ?>
		                            	<input type="email" name="email[]" class="form-control form-control-sm email-key-up m-t2" placeholder="Email" autocomplete="off">	
		                            </div>
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Services</label> 
		                            <div class="service-body">
                                        <?php foreach (explode(',', $lead['services']) as $key => $value) { ?>
                                            <select class="form-control form-control-sm service-change m-t2" name="services[]">
                                                <option value="">-- Select Service --</option>
                                                <?php foreach ($this->general_model->get_services() as $sekey => $sevalue) { ?> 
                                                    <option value="<?= $sevalue['id'] ?>" <?= selected($sevalue['id'],$value) ?>><?= $sevalue['name'] ?></option>
                                                <?php } ?>
                                            </select>   
                                        <?php } ?>
		                            	<select class="form-control form-control-sm service-change m-t2" name="services[]">
	                    					<option value="">-- Select Service --</option>
	                    					<?php foreach ($this->general_model->get_services() as $sekey => $sevalue) { ?> 
	                    						<option value="<?= $sevalue['id'] ?>"><?= $sevalue['name'] ?></option>
	                    					<?php } ?>
	                    				</select>	
		                            </div>
		                        </div>
		                    </div>

	                    </div>
                    </div>

                    <div class="col-md-12">
	                    <div class="row">
	                    	<div class="col-md-3">
		                        <div class="form-group">
		                            <label>Importance</label> 
		                            <input name="importance" type="text" placeholder="Importance" class="form-control form-control-sm" value="<?= set_value('importance',$lead['importance']); ?>">
		                            <?= form_error('importance') ?>
		                        </div>
		                    </div>
		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Remarks</label> 
		                            <textarea name="remarks" type="text" placeholder="Remarks" class="form-control form-control-sm" value=""><?= set_value('remarks',$lead['remarks']); ?></textarea>
		                            <?= form_error('remarks') ?>
		                        </div>
		                    </div>
		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Next Follow up Date <span class="-req">*</span></label> 
		                            <input name="ndate" type="text" placeholder="Next Follow up Date" class="form-control form-control-sm datepicker" value="<?= set_value('ndate',vd($lead['next_followup_date'])); ?>" readonly required>
		                            <?= form_error('ndate') ?>
		                        </div>
		                    </div>
		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Source</label> 
	                            	<select class="form-control form-control-sm" name="source">
                    					<option value="">-- Select Source --</option>
                    					<?php foreach ($this->general_model->get_sources() as $sekey => $sevalue) { ?> 
                    						<option value="<?= $sevalue['id'] ?>" <?= selected($sevalue['id'],$lead['source']) ?>><?= $sevalue['name'] ?></option>
                    					<?php } ?>
                    				</select>	
		                        </div>
		                    </div>
	                    </div>
	                </div>

	                <div class="col-md-12">
	                    <div class="row">
	                    	<div class="col-md-3">
		                        <div class="form-group">
		                            <label>Occupation</label> 
	                            	<select class="form-control form-control-sm" name="occupation">
                    					<option value="">-- Select Occupation --</option>
                    					<option value="Business" <?= selected("Business",$lead['occupation']) ?>>Business</option>
                    					<option value="Job" <?= selected("Job",$lead['occupation']) ?>>Job</option>
                    					<option value="Other" <?= selected("Other",$lead['occupation']) ?>>Other</option>
                    					<option value="Both" <?= selected("Both",$lead['occupation']) ?>>Both</option>
                    				</select>	
		                        </div>
		                    </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Special Quotation</label> 
                                    <input name="special_quote" type="text" placeholder="Special Quotation" class="form-control form-control-sm" value="<?= set_value('special_quote',$lead['quotation']); ?>">
                                    <?= form_error('special_quote') ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Health Insurance</label> 
                                    <select class="form-control form-control-sm" name="helth_insurance">
                                        <option value="">-- Select --</option>
                                        <option value="Yes" <?= selected("Yes",$lead['helth_insurance']) ?>>Yes</option>
                                        <option value="No" <?= selected("No",$lead['helth_insurance']) ?>>No</option>
                                    </select>   
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Life Insurance</label> 
                                    <select class="form-control form-control-sm" name="life_insurance">
                                        <option value="">-- Select --</option>
                                        <option value="Yes" <?= selected("Yes",$lead['life_insurance']) ?>>Yes</option>
                                        <option value="No" <?= selected("No",$lead['life_insurance']) ?>>No</option>
                                    </select>   
                                </div>
                            </div>
	                    </div>
	                </div>

                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Prefered Language</label> 
                                    <div class="language-body">
                                        <?php foreach (explode(',', $lead['languages']) as $key => $value) { ?>
                                            <select class="form-control form-control-sm language-change m-t2" name="prefered_language[]">
                                                <option value="">-- Select --</option>
                                                <option value="English" <?= selected("English",$value) ?>>English</option>
                                                <option value="Hindi" <?= selected("Hindi",$value) ?>>Hindi</option>
                                                <option value="Gujarati" <?= selected("Gujarati",$value) ?>>Gujarati</option>
                                            </select>  
                                        <?php } ?>
                                        <select class="form-control form-control-sm language-change m-t2" name="prefered_language[]">
                                            <option value="">-- Select --</option>
                                            <option value="English">English</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Gujarati">Gujarati</option>
                                        </select>   
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>From - To Time</label> 
                                    <div class="from-to-body col-md-12 row">
                                        <?php foreach (explode(',', $lead['timing']) as $key => $value) { ?>
                                            <input name="from[]" type="text" placeholder="From" class="form-control form-control-sm col-md-6 from-keyup time-text m-t2" value="<?= explode('-', $value)[0] ?>">       
                                            <input name="to[]" type="text" placeholder="To" class="form-control form-control-sm col-md-6 time-text m-t2" value="<?= explode('-', $value)[1] ?>">              
                                        <?php } ?>
                                        <input name="from[]" type="text" placeholder="From" class="form-control form-control-sm col-md-6 from-keyup time-text m-t2" value="">        
                                        <input name="to[]" type="text" placeholder="To" class="form-control form-control-sm col-md-6 time-text m-t2" value="">        
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Landline</label> 
                                    <div class="landline-body">
                                        <?php foreach (explode(',', $lead['landline']) as $key => $value) { ?>
                                            <input type="text" name="landline[]" class="form-control form-control-sm numbers landline-key-up m-t2" autocomplete="off" placeholder="Landline" value="<?= $value ?>">       
                                        <?php } ?>
                                        <input type="text" name="landline[]" class="form-control form-control-sm numbers landline-key-up m-t2" autocomplete="off" placeholder="Landline">   
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>ADDITIONAL INFORMATION</h4>
                                <table class="table table-bordered table-mini">
                                    <thead>
                                        <tr>
                                            <th>Industry</th>
                                            <th>Sub Industry</th>
                                            <th>Remarks</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <thead class="body-additional-info">
                                        <?php foreach (json_decode($lead['additional']) as $akey => $avalue) { ?>
                                            <tr>
                                                <td>
                                                    <select class="form-control form-control-sm additional-info-change" name="industry[]">
                                                        <option value="">-- Select Industry --</option>
                                                        <?php foreach ($this->general_model->list_industries() as $key => $value) { ?>
                                                            <option value="<?= $value['id'] ?>" <?= selected($avalue[0],$value['id']) ?>><?= $value['name'] ?></option>
                                                        <?php } ?>
                                                    </select>   
                                                </td>
                                                <td>
                                                    <select class="form-control form-control-sm" name="sub_industry[]">
                                                        <option value="">-- Select Sub Industry --</option>
                                                        <?php foreach ($this->general_model->list_subindustry() as $key => $value) { ?>
                                                            <option value="<?= $value['id'] ?>" <?= selected($avalue[1],$value['id']) ?>><?= $value['name'] ?></option>
                                                        <?php } ?>
                                                    </select>   
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="ind_remarks[]" placeholder="Remarks"><?= $avalue[2] ?></textarea>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-mini remove-row"><i class="fa fa-remove"></i></button>
                                                </td>
                                            </tr>    
                                        <?php } ?>
                                        <tr>
                                            <td>
                                                <select class="form-control form-control-sm additional-info-change" name="industry[]">
                                                    <option value="">-- Select Industry --</option>
                                                    <?php foreach ($this->general_model->list_industries() as $key => $value) { ?>
                                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                                    <?php } ?>
                                                </select>   
                                            </td>
                                            <td>
                                                <select class="form-control form-control-sm" name="sub_industry[]">
                                                    <option value="">-- Select Sub Industry --</option>
                                                    <?php foreach ($this->general_model->list_subindustry() as $key => $value) { ?>
                                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                                    <?php } ?>
                                                </select>   
                                            </td>
                                            <td>
                                                <textarea class="form-control" name="ind_remarks[]" placeholder="Remarks"></textarea>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $lead['id'] ?>">
            	</div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= base_url('leads') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Cancel</a>
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>
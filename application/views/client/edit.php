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
        <form method="post" action="<?= base_url('client/update') ?>" enctype="multipart/form-data" id="update_client_form">
            <div class="card-block">
                <div class="row">

                    <?php if(get_user()['user_type'] == "0"){ ?>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Branch <span class="-req">*</span></label> 
                                <select class="form-control form-control-sm select2" name="branch" required>
                                    <option value="">-- Select Branch --</option>
                                    <?php foreach ($this->general_model->get_branches() as $bkey => $bvalue) { ?>
                                        <option value="<?= $bvalue['id'] ?>" <?= selected($_client['branch'],$bvalue['id']) ?>><?= $bvalue['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('branch') ?>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <input type="hidden" name="branch" value="<?= get_user()['branch'] ?>">
                    <?php } ?>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Source <span class="-req">*</span></label> 
                            <select class="form-control form-control-sm" name="source" required>
                                <option value="">-- Select Source --</option>
                                <?php foreach ($this->general_model->get_sources() as $sekey => $sevalue) { ?> 
                                    <option value="<?= $sevalue['id'] ?>" <?= selected($_client['source'],$sevalue['id']) ?>><?= $sevalue['name'] ?></option>
                                <?php } ?>
                            </select>   
                        </div>
                    </div>

                	<div class="col-md-2">
                        <div class="form-group">
                            <label>First Name<span class="-req">*</span></label> 
                            <input name="fname" type="text" placeholder="First Name" class="form-control form-control-sm" value="<?= set_value('fname',$_client['fname']); ?>" required>
                            <?= form_error('fname') ?>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Middle Name</label> 
                            <input name="mname" type="text" placeholder="Middle Name" class="form-control form-control-sm" value="<?= set_value('mname',$_client['mname']); ?>">
                            <?= form_error('mname') ?>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Last Name<span class="-req">*</span></label> 
                            <input name="lname" type="text" placeholder="Last Name" class="form-control form-control-sm" value="<?= set_value('lname',$_client['lname']); ?>" required>
                            <?= form_error('lname') ?>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Firm Name</label> 
                            <input name="firm" type="text" placeholder="Firm Name" class="form-control form-control-sm" value="<?= set_value('firm',$_client['firm']); ?>" >
                            <?= form_error('firm') ?>
                        </div>
                    </div>

                    <div class="col-md-12">
	                    <div class="row">

	                    	<div class="col-md-3">
                                <div class="form-group">
                                    <label>Mobile <span class="-req">*</span></label> 
                                    <div class="mobile-body">
                                        <?php foreach (explode(',', $_client['mobile']) as $key => $value) { ?>
                                            <input type="text" name="mobile[]" class="form-control form-control-sm numbers mobile-key-up m-t2" minlength="10" autocomplete="off" maxlength="10" placeholder="Mobile" value="<?= $value ?>" <?= $key == '0'?'required':'' ?>>        
                                        <?php } ?>
                                        <input type="text" name="mobile[]" class="form-control form-control-sm numbers mobile-key-up m-t2" minlength="10" autocomplete="off" maxlength="10" placeholder="Mobile" >   
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Email</label> 
                                    <div class="email-body">
                                        <?php if($_client['email'] != ""){ foreach (explode(',', $_client['email']) as $key => $value) { ?>
                                            <input type="email" name="email[]" class="form-control form-control-sm email-key-up m-t2" placeholder="Email" value="<?= $value ?>" autocomplete="off">    
                                        <?php } } ?>
                                        <input type="email" name="email[]" class="form-control form-control-sm email-key-up m-t2" placeholder="Email" autocomplete="off">
                                    </div>
                                </div>
                            </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>PAN No.<span class="-req">*</span></label> 
		                            <input name="pan" type="text" placeholder="PAN No." class="form-control form-control-sm" value="<?= set_value('pan',$_client['pan']); ?>" minlength="10" maxlength="10" pattern="[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}" id="panNo" required>
		                            <?= form_error('pan') ?>
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Date Of Birth <span class="-req">*</span></label> 
		                            <input name="dob" type="text" placeholder="Date Of Birth" class="form-control form-control-sm birth-date" value="<?= set_value('pan',vd($_client['dob'])); ?>" >
		                            <?= form_error('dob') ?>
		                        </div>
		                    </div>

	                    </div>
	                </div>

	                <div class="col-md-3">
                        <div class="form-group">
                            <label>Gender<span class="-req">*</span></label> 
                            <select class="form-control form-control-sm" name="gender" required>
                                <option value="">-- Select --</option>
                                <option value="MALE" <?= selected($_client['gender'],"MALE") ?>>MALE</option>
                                <option value="FEMALE" <?= selected($_client['gender'],"FEMALE") ?>>FEMALE</option>
                                <option value="NONE" <?= selected($_client['gender'],"NONE") ?>>NONE</option>
                            </select>   
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Address Line-1<span class="-req">*</span></label> 
                            <input name="add1" type="text" placeholder="Address Line-1" class="form-control form-control-sm" value="<?= set_value('add1',$_client['add1']); ?>" required>
                            <?= form_error('add1') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Address Line-2</label> 
                            <input name="add2" type="text" placeholder="Address Line-2" class="form-control form-control-sm" value="<?= set_value('add2',$_client['add2']); ?>" >
                            <?= form_error('add2') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Area/Village<span class="-req">*</span></label> 
                            <select class="form-control form-control-sm select2" name="area" required>
                            	<option value="">-- Select Area/Village --</option>
                            	<?php foreach ($this->general_model->get_areas() as $akey => $avalue) { ?>
                            		<option value="<?= $avalue['id'] ?>" <?= selected($_client['area'],$avalue['id']) ?>><?= $avalue['name'] ?></option>
                            	<?php } ?>
                            </select>
                            <?= form_error('area') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>City/Taluka<span class="-req">*</span></label> 
                            <select class="form-control form-control-sm select2" name="city" required>
                            	<option value="">-- Select City/Taluka --</option>
                            	<?php foreach ($this->general_model->get_cities() as $ckey => $cvalue) { ?>
                            		<option value="<?= $cvalue['id'] ?>" <?= selected($_client['city'],$cvalue['id']) ?>><?= $cvalue['name'] ?></option>
                            	<?php } ?>
                            </select>
                            <?= form_error('city') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>District<span class="-req">*</span></label> 
                            <select class="form-control form-control-sm select2" name="district" required>
                                <option value="">-- Select District --</option>
                                <?php foreach ($this->general_model->get_districts() as $ckey => $cvalue) { ?>
                                    <option value="<?= $cvalue['id'] ?>" <?= selected($_client['district'],$cvalue['id']) ?>><?= $cvalue['name'] ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('district') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>State<span class="-req">*</span></label> 
                            <select class="form-control form-control-sm select2" name="state" required>
                            	<option value="">-- Select State --</option>
                            	<?php foreach ($this->general_model->get_states() as $skey => $svalue) { ?>
                            		<option value="<?= $svalue['id'] ?>" <?= selected($_client['state'],$svalue['id']) ?>><?= $svalue['name'] ?></option>
                            	<?php } ?>
                            </select>
                            <?= form_error('state') ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Pin</label> 
                            <input name="pin" type="text" placeholder="Pin" maxlength="6" minlength="6" class="form-control form-control-sm" value="<?= set_value('pin',$_client['pin']); ?>" >
                            <?= form_error('pin') ?>
                        </div>
                    </div>

                    <div class="col-md-12">
	                    <div class="row">

	                    	<div class="col-md-3">
		                        <div class="form-group">
		                            <label>Language<span class="-req">*</span></label> 
		                            <div class="language-body">
                                        <?php foreach (explode(',', $_client['language']) as $key => $value) { ?>
                                            <select class="form-control form-control-sm language-change m-t2" name="prefered_language[]" <?= $key == '0'?'required':'' ?>>
                                                <option value="">-- Select Language --</option>
                                                <option value="GUJARATI" <?= selected($value,"GUJARATI") ?>>GUJARATI</option>
                                                <option value="HINDI" <?= selected($value,"HINDI") ?>>HINDI</option>
                                                <option value="ENGLISH" <?= selected($value,"ENGLISH") ?>>ENGLISH</option>
                                            </select>   
                                        <?php } ?>
			                            <select class="form-control form-control-sm language-change m-t2" name="prefered_language[]">
			                                <option value="">-- Select Language --</option>
			                                <option value="GUJARATI">GUJARATI</option>
			                                <option value="HINDI">HINDI</option>
			                                <option value="ENGLISH">ENGLISH</option>
			                            </select>   
			                        </div>
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                        	<label>Prefered Time To Call</label> 
		                        	<div class="time-body">
                                        <?php if($_client['time_to_call'] != ""){ foreach (explode(',', $_client['time_to_call']) as $key => $value) { ?>
		                        		    <input name="time_to_call[]" type="text" placeholder="Add From To Time Here" class="form-control form-control-sm from-to-time m-t2" value="<?= $value ?>" >
                                        <?php } } ?>
                                        <input name="time_to_call[]" type="text" placeholder="Add From To Time Here" class="form-control form-control-sm from-to-time m-t2" value="" >
		                        	</div>
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Health Insurance</label> 
		                            <select class="form-control form-control-sm" name="health_insurance">
                                        <option value="NOT KNOWN" <?= selected($_client['health_in'],"NOT KNOWN") ?>>NOT KNOWN</option>
		                                <option value="YES" <?= selected($_client['health_in'],"YES") ?>>YES</option>
		                                <option value="NO" <?= selected($_client['health_in'],"NO") ?>>NO</option>
		                            </select>   
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Life Insurance</label> 
		                            <select class="form-control form-control-sm" name="life_insurance">
                                        <option value="NOT KNOWN" <?= selected($_client['life_in'],"NOT KNOWN") ?>>NOT KNOWN</option>
                                        <option value="YES" <?= selected($_client['life_in'],"YES") ?>>YES</option>
                                        <option value="NO" <?= selected($_client['life_in'],"NO") ?>>NO</option>
		                            </select>   
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>ITR CLIENT<span class="-req">*</span></label> 
		                            <select class="form-control form-control-sm" name="itr_client" required>
		                                <option value="">-- Select --</option>
		                                <option value="YES" <?= selected($_client['itr_client'],"YES") ?>>YES</option>
                                        <option value="NO" <?= selected($_client['itr_client'],"NO") ?>>NO</option>
		                            </select>   
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>GST CLIENT<span class="-req">*</span></label> 
		                            <select class="form-control form-control-sm gst_client" name="gst_client" required>
		                                <option value="">-- Select --</option>
		                                <option value="YES" <?= selected($_client['gst_client'],"YES") ?>>YES</option>
                                        <option value="NO" <?= selected($_client['gst_client'],"NO") ?>>NO</option>
		                            </select>   
		                        </div>
		                    </div>

		                    <div class="col-md-3 gst_type_div" <?php if($_client['gst_client'] == 'NO'){ ?>style="display: none;" <?php } ?>>
		                        <div class="form-group">
		                            <label>GST TYPE<span class="-req">*</span></label> 
		                            <select class="form-control form-control-sm gst_type" name="gst_type">
		                                <option value="">-- Select --</option>
		                                <option value="COMPOSITION" <?= selected($_client['gst_type'],"COMPOSITION") ?>>COMPOSITION</option>
		                                <option value="REGULAR" <?= selected($_client['gst_type'],"REGULAR") ?>>REGULAR</option>
		                            </select>   
		                        </div>
		                    </div>

		                    <div class="col-md-3 month_quater_div" <?php if($_client['gst_client'] == 'NO' || $_client['gst_type'] == 'COMPOSITION'){ ?>style="display: none;" <?php } ?>>
		                        <div class="form-group">
		                            <label>Monthly/Quarterly<span class="-req">*</span></label> 
		                            <select class="form-control form-control-sm month_quater" name="month_quater">
		                                <option value="">-- Select --</option>
		                                <option value="MONTHLY" <?= selected($_client['month_quater'],"MONTHLY") ?>>MONTHLY</option>
		                                <option value="QUATERLY" <?= selected($_client['month_quater'],"QUATERLY") ?>>QUATERLY</option>
		                            </select>   
		                        </div>
		                    </div>


		                    <div class="col-md-12">
		                    	<h4>Profile</h4>
		                    </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Occupation<span class="-req">*</span></label> 
		                            <select class="form-control form-control-sm occupation-onchange" name="occupation" required>
		                                <option value="">-- Select Occupation --</option>
		                                <option value="BUSINESS" <?= selected($_client['occupation'],"BUSINESS") ?>>BUSINESS</option>
		                                <option value="JOB" <?= selected($_client['occupation'],"JOB") ?>>JOB</option>
		                                <option value="OTHER" <?= selected($_client['occupation'],"OTHER") ?>>OTHER</option>
		                                <option value="BOTH" <?= selected($_client['occupation'],"BOTH") ?>>BOTH</option>
		                            </select>   
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Industry <span class="-req industry-required">*</span></label> 
		                            <select class="form-control form-control-sm customer-industry-select2" name="industry" required>
		                            	<option value="">-- Select Industry --</option>
		                            	<?php foreach ($this->general_model->list_industries() as $skey => $svalue) { ?>
		                            		<option value="<?= $svalue['id'] ?>" <?= selected($_client['industry'],$svalue['id']) ?>><?= $svalue['name'] ?></option>
		                            	<?php } ?>
		                            </select>
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Sub Industry<span class="-req sub-industry-required">*</span></label> 
		                            <select class="form-control form-control-sm select2 customer-sub-industry-select2" name="sub_industry" required>
		                            	<option value="">-- Select Sub Industry --</option>
		                            	<?php foreach ($this->general_model->list_subindustry() as $skey => $svalue) { ?>
		                            		<option value="<?= $svalue['id'] ?>" <?= selected($_client['sub_industry'],$svalue['id']) ?>><?= $svalue['name'] ?></option>
		                            	<?php } ?>
		                            </select>
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label>Industry Remarks</label> 
		                            <textarea name="ind_remaarks" type="text" placeholder="Industry Remarks" class="form-control form-control-sm" value="" ><?= $_client['ind_remarks'] ?></textarea>
		                        </div>
		                    </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Client Type <span class="-req">*</span></label> 
                                    <select class="form-control form-control-sm select2" name="client_type" required>
                                        <option value="">-- Select --</option>
                                        <?php foreach ($this->general_model->get_client_types() as $sekey => $sevalue) { ?> 
                                            <option value="<?= $sevalue['id'] ?>" <?= selected($_client['client_type'],$sevalue['id']) ?>><?= $sevalue['name'] ?></option> 
                                        <?php } ?>
                                    </select>   
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Profile Introduction</label> 
                                    <textarea name="profile_intro" type="text" placeholder="Profile Introduction" class="form-control form-control-sm" value="" ><?= $_client['profile_intro'] ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Actual Turnover & Stock & Other</label> 
                                    <textarea name="turnover_notes" type="text" placeholder="Actual Turnover & Stock & Other" class="form-control form-control-sm" value="" ><?= $_client['turnover_notes'] ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Future Specific Goal</label> 
                                    <textarea name="goal" type="text" placeholder="Future Specific Goal" class="form-control form-control-sm" value="" ><?= $_client['goal'] ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Special Remarks</label> 
                                    <textarea name="quotation" type="text" placeholder="Special Remarks" class="form-control form-control-sm" value="" ><?= $_client['quotation'] ?></textarea>
                                </div>
                            </div>
	                    </div>
	                </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <input type="hidden" name="clientid" value="<?= $_client['id'] ?>" id="clientId">
                <a href="<?= base_url('client') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function($) {
        $('.service-body .select2-container').addClass('m-t2');  
    });
</script>
<script type="text/javascript">
	$(function () {
		$('.btn-delete').click(function() {
			if(confirm('Are you sure you want to delete this?')){
				return true;
			}
			return false;
		})

		$('.table-dt').DataTable({
            "dom": "<'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            
        });

        $('.select2').select2();
	})
</script>

<script type="text/javascript">
	$(function(){
		$(document).on('keyup','.mobile-key-up', function(){
			if($('.mobile-body').children().last().val() != ""){
				var textbox = '<input type="text" name="mobile[]" class="form-control form-control-sm numbers m-t2 mobile-key-up" autocomplete="off" maxlength="10" placeholder="Mobile" minlength="10">';
				$('.mobile-body').append(textbox);
			}
		});

		$(document).on('keyup','.email-key-up', function(){
			if($('.email-body').children().last().val() != ""){
				var textbox = '<input type="email" name="email[]" class="form-control form-control-sm email-key-up m-t2" autocomplete="off" placeholder="Email">';
				$('.email-body').append(textbox);
			}
		});

		$(document).on('change','.service-change', function(){
			if($(this).val() != ""){
				$('.amount-body').children().eq(($(this).index() / 2)).val($(this).val().split("-")[1]);
			}else{
				$('.amount-body').children().eq(($(this).index() / 2)).val("");
			}
			if($('.service-body select').last().val() != ""){
				textbox = '<select class="form-control form-control-sm service-change m-t2 select2" name="services[]">';
					textbox += '<option value="">-- Select Service --</option>';
					textbox += '<?php foreach ($this->general_model->get_services() as $sekey => $sevalue) { ?>';
					textbox += '<option value="<?= $sevalue['id'] ?>-<?=$sevalue['price']?>"><?= $sevalue['name'] ?></option>';
					textbox += '<?php } ?>';	                    					
				textbox += '</select>';	                    					        				
				$('.service-body').append(textbox);
				$('.select2').select2();
				$('.select2-container').addClass('m-t2');
				textbox = '<input type="text" name="amount[]" class="form-control form-control-sm decimal-num mobile-key-up m-t2" autocomplete="off" placeholder="Amount" >';
				$('.amount-body').append(textbox);
			}
		});	

		$(document).on('change','.language-change', function(){
			if($('.language-body').children().last().val() != ""){
				textbox = '<select class="form-control form-control-sm language-change m-t2" name="prefered_language[]">';
					textbox += '<option value="">-- Select --</option>';
					textbox += '<option value="English">English</option>';
                    textbox += '<option value="Hindi">Hindi</option>';
                    textbox += '<option value="Gujarati">Gujarati</option>';
				textbox += '</select>';	                    					        				
				$('.language-body').append(textbox);
			}
		});	

		$(document).on('keyup','.from-keyup', function(){
			if($('.from-to-body').children('.from-keyup').last().val() != ""){
				var textbox = ' <input name="from[]" type="text" placeholder="From" class="form-control form-control-sm col-md-6 from-keyup m-t2" value="">';
                 	textbox += '<input name="to[]" type="text" placeholder="To" class="form-control form-control-sm col-md-6 m-t2" value="">';
				$('.from-to-body').append(textbox);
			}
		});

		$(document).on('keyup','.landline-key-up', function(){
			if($('.landline-body').children().last().val() != ""){
				var textbox = '<input type="text" name="landline[]" class="form-control form-control-sm numbers landline-key-up m-t2" autocomplete="off" placeholder="Landline" minlength="5" maxlength="11">';
				$('.landline-body').append(textbox);
			}
		});

		$(document).on('keyup','.from-to-time', function(){
			if($('.time-body').children().last().val() != ""){
				var textbox = '<input name="time_to_call[]" type="text" placeholder="Add From To Time Here" class="form-control form-control-sm from-to-time m-t2" value="" >';
				$('.time-body').append(textbox);
			}
		});

		$(document).on('change','.additional-info-change', function(){
			if($('.body-additional-info tr:last td:first').children('.additional-info-change').val() != ""){
				textbox = '<tr><td>';
					textbox += '<select class="form-control form-control-sm additional-info-change" name="industry[]">';
					textbox += '<option value="">-- Select Industry --</option>';
					textbox += '<?php foreach ($this->general_model->list_industries() as $key => $value) { ?>';
                        textbox += '<option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>';
                    textbox += '<?php } ?>';
                	textbox += '</select></td>';
                textbox += '<td><select class="form-control form-control-sm" name="sub_industry[]">';
                    textbox += '<option value="">-- Select Sub Industry --</option>';
                    textbox += '<?php foreach ($this->general_model->list_subindustry() as $key => $value) { ?>';
                        textbox += '<option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>';
                    textbox += '<?php } ?>';
                textbox += '</select></td>';
                textbox += '<td><textarea class="form-control" name="ind_remarks[]" placeholder="Remarks"></textarea></td>';
                    textbox += '<td class="text-center">';
                    textbox += '<button type="button" class="btn btn-danger btn-mini remove-row"><i class="fa fa-remove"></i></button></td></tr>';
                                            
                $('.body-additional-info').append(textbox);
			}
		});

		$(document).on('click','.remove-row', function(){
			$(this).closest('tr').remove();
		});

		$(document).on('click','.transfer-lead',function(){
			$('#lead_transfer_model').modal('show');
			$('.select2n').select2({
			    dropdownParent: $('#lead_transfer_model .modal-content')
			});
			$('#lead_tranfer_id').val($(this).data('lead'));
		});

		$(document).on('click','.add-attechment-row',function(){
			textbox = '<tr>';
				textbox += '<td><input type="file" name="file[]" class="form-control fileupload-change" onchange="readFile(this)"></td>';
				textbox += '<td class="text-center"><button type="button" class="btn btn-danger btn-mini remove-row"><i class="fa fa-remove"></i></button></td>';
			textbox += '</tr>';
			$('.body-attchment').append(textbox);
		});


		$(document).on('change','.gst_client',function(){
			_this = $(this);
			if(_this.val() == "YES"){
				$('.gst_type_div').show();
				$('.gst_type').val('');
				$('.gst_type').attr('required',true);
			}else{
				$('.gst_type_div').hide();
				$('.gst_type').val('');
				$('.gst_type').removeAttr('required');
				$('.month_quater_div').hide();
				$('.month_quater').removeAttr('required');
			}
		});

		$(document).on('change','.gst_type',function(){
			_this = $(this);
			if(_this.val() == "REGULAR"){
				$('.month_quater_div').show();
				$('.month_quater').val('');
				$('.month_quater').attr('required',true);
			}else{
				$('.month_quater_div').hide();
				$('.month_quater').val('');
				$('.month_quater').removeAttr('required');
			}
		});

		$(document).on('click', '.remove-file-lead', function(event) {
			if(confirm('Are you sure want to delete this?')){
				id = $(this).data('id');
				athis = $(this); 
				
				$.ajax({
	                type: "POST",
	                url : "<?= base_url('leads/file_delete'); ?>",
	                data : "id="+id,
	                cache : false,
	                beforeSend: function() {
	                    PNOTY('Please Wait','info');     
	                },
	                success: function(out)
	                {
	                	athis.closest(".remove-file").remove();
	                	PNOTY("File Deleted",'success');     	
	                }
                });
			}
		});

		$(document).on('click', '.add-followup', function(event) {
			_this = $(this);
			_this.html('<i class="fa fa-circle-o-notch fa-spin"></i> Please Wait');
			$("#id_followup_lead").val(_this.data('id'));
			$("#type_followup_lead").val(_this.data('type'));
			$('#message_followup').val(_this.data('stop'));
			$.ajax({
                type: "POST",
                url : "<?= base_url('followup/get'); ?>",
                data : "id="+_this.data('id')+"&type="+_this.data('type'),
                dataType: "JSON",
                cache : false,
                beforeSend: function() {
                    
                },
                success: function(out)
                {
                	_this.html('<i class="fa fa-question"></i>');
                	$('#followup_model').modal('show');
                	$('#followup_body').empty();
                	$('#followup_body').append(out[0]);
                	if(out[0] != ""){
						$('#followup_table').show();
					}else{
						$('#followup_table').hide();
					}
					$('#type_followup_cus').val(out[1]);
                }
            });
		});

		$(document).on('click', '.add-job-followup', function(event) {
			_this = $(this);
			_this.html('<i class="fa fa-circle-o-notch fa-spin"></i> Please Wait');
			$("#id_jobModel").val(_this.data('id'));
			$("#type_followup_job").val(_this.data('type'));
			$('#message_followup_job').val(_this.data('stop'));
			$('#jobStatus').val(_this.data('status'))
			$.ajax({
                type: "POST",
                url : "<?= base_url('followup/job_get'); ?>",
                data : "id="+_this.data('id')+"&type="+_this.data('type'),
                dataType: "JSON",
                cache : false,
                beforeSend: function() {
                    
                },
                success: function(out)
                {
                	_this.html('<i class="fa fa-question"></i>');
                	$('#job_followup_modal').modal('show');
                	$('#jobfollowup_body').empty();
                	$('#jobfollowup_body').append(out[0]);
                	if(out[0] != ""){
						$('#jobfollowup_table').show();
					}else{
						$('#jobfollowup_table').hide();
					}
					$('#type_followup_jobdone').val(out[1]);
                }
            });
		});		

		$('#followupForm').submit(function(event) {
			event.preventDefault();
			if($('#type_followup_cus').val() != '1'){
				if($("#customer_checkbox").prop('checked') == true){
				    cus = 1;
				}else{
					cus = '';
				}
				$.ajax({
	                type: "POST",
	                url : "<?= base_url('followup/save'); ?>",
	                data : "cus="+cus+"&remarks="+$('#followup_remarks').val()+"&date="+$('#followup_date').val()+"&ftime="+$('#followup_timef').val()+"&ttime="+$('#followup_timet').val()+"&id="+$('#id_followup_lead').val()+"&type="+$('#type_followup_lead').val(),
	                cache : false,
	                dataType: "JSON",
	                beforeSend: function() {
	                    $('#followup_save').attr('disabled','true');
	                    $('#followup_save').html('<i class="fa fa-circle-o-notch fa-spin"></i> Please Wait');
	                },
	                success: function(out)
	                {
	                	PNOTY("Followup Saved",'success');  
	                	$('#followup_save').removeAttr('disabled');
	                    $('#followup_save').html('Save');
	                    $('#followup_remarks').val("");
	                    $('#followup_time').val("");
	                    if($("#customer_checkbox").prop('checked') == true){
						    $('#customer_checkbox').prop('checked', false);
						}
						$('#followup_body').prepend(out[0]);
						$('#followup_table').show();
						$('#type_followup_cus').val(cus);

						$('#fdate-'+$('#id_followup_lead').val()).html(out[1]);
						if(cus == 1){
							$('#tr-lead-'+$('#id_followup_lead').val()).remove();
						}
	                }
	            });
			}else{
				PNOTY($('#message_followup').val(),'error');  
			}
		});

		$('#jobfollowupForm').submit(function(event) {
			event.preventDefault();
			if($('#type_followup_jobdone').val() != '1'){				
				$.ajax({
	                type: "POST",
	                url : "<?= base_url('followup/saveJob'); ?>",
	                data : "remarks="+$('#followup_remarks').val()+"&date="+$('#followup_date').val()+"&ftime="+$('#followup_timef').val()+"&ttime="+$('#followup_timet').val()+"&id="+$('#id_jobModel').val()+"&type="+$('#type_followup_job').val()+"&status="+$('#jobStatus').val(),
	                cache : false,
	                dataType: "JSON",
	                beforeSend: function() {
	                    $('#followup_save').attr('disabled','true');
	                    $('#followup_save').html('<i class="fa fa-circle-o-notch fa-spin"></i> Please Wait');
	                },
	                success: function(out)
	                {
	                	PNOTY("Followup Saved",'success');  
	                	$('#followup_save').removeAttr('disabled');
	                    $('#followup_save').html('Save');
	                    $('#followup_remarks').val("");
	                    $('#followup_timef').val("");
	                    $('#followup_timet').val("");
						$('#jobfollowup_body').prepend(out[0]);
						$('#jobfollowup_table').show();

						$('#status-'+$('#id_jobModel').val()).html(out[1]);
	                }
	            });
			}else{
				PNOTY($('#message_followup_job').val(),'error');  
			}
		});

		$('#transferLeadAll').click(function(){
			if($(".checkBox:checked").length > 0){
				str = "";
				$('.checkBox:checked').each(function () {
			       	str += $(this).val()+"-";
			  	});
			  	$('#leads_transfer_model').modal('show');
			  	$('.select2n').select2({
				    dropdownParent: $('#leads_transfer_model .modal-content')
				});
			  	$('#leadIds').val(str.substring(0, str.length - 1));
			}else{
				PNOTY("Please Select any lead",'error');  
			}
		});

		$('#tranferJob').click(function () {
			if($(".checkBox:checked").length > 0){
				str = "";
				$('.checkBox:checked').each(function () {
			       	str += $(this).val()+"-";
			  	});
			  	$('#jobTransferModel').modal('show');
			  	$('.select2n').select2({
				    dropdownParent: $('#jobTransferModel .modal-content')
				});
			  	$('#jobIds').val(str.substring(0, str.length - 1));
			}else{
				PNOTY("Please Select any job",'error');  
			}
		})
	})



	function otherArea(val){
		if(val == '3244'){
			$('#otherArea').show();
			$('.other-area').attr('required',true);
		}else{
			$('#otherArea').hide();
			$('.other-area').removeAttr('required');
		}
	}
</script>
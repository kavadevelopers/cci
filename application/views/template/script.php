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
				var textbox = '<input type="text" name="mobile[]" class="form-control form-control-sm numbers m-t2 mobile-key-up" autocomplete="off" maxlength="10" placeholder="Mobile">';
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
			if($('.service-body').children().last().val() != ""){
				textbox = '<select class="form-control form-control-sm service-change m-t2" name="services[]">';
					textbox += '<option value="">-- Select Service --</option>';
					textbox += '<?php foreach ($this->general_model->get_services() as $sekey => $sevalue) { ?>';
					textbox += '<option value="<?= $sevalue['id'] ?>"><?= $sevalue['name'] ?></option>';
					textbox += '<?php } ?>';	                    					
				textbox += '</select>';	                    					        				
				$('.service-body').append(textbox);
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
				var textbox = '<input type="text" name="landline[]" class="form-control form-control-sm numbers landline-key-up m-t2" autocomplete="off" placeholder="Landline">';
				$('.landline-body').append(textbox);
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
			$('#lead_tranfer_id').val($(this).data('lead'));
		});
	})
</script>
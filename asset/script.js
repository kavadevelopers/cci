function PNOTY(_text,_type){
	new PNotify({
	    text: _text,
	    icon : false,
	    type:_type,
	    buttons: {
	      	sticker: false
	    }
	});
}


function delete_confirm(url) {
	swal({
		title: "Are you sure want to delete this?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Yes, delete it!",
		closeOnConfirm: false
	},
	function(isConfirm) {
		if (isConfirm) {
			
		} else {
			return false;
		}
	});
}

$(function(){
	$(document).on('keydown','.decimal-num', function(event){

		if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190 || event.keyCode == 110) {

		} else {
			event.preventDefault();
		}
		
		if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
			event.preventDefault();

		if($(this).val().indexOf('.') !== -1 && event.keyCode == 110)
			event.preventDefault();

	});

	$(document).on('keydown','.numbers', function(event){

		if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46) {

		} else {
			event.preventDefault();
		}

	});

	$(document).on('keydown','.time-text', function(event){

		if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 186) {

		} else {
			event.preventDefault();
		}


		if($(this).val().indexOf(':') !== -1 && event.keyCode == 186)
			event.preventDefault();

	});

	$('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight:'TRUE',
        autoclose: true
    });

	var date = new Date();
   var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('.datepicker-new').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight:'TRUE',
        autoclose: true,
        startDate: new Date()
    });

    // $('.timepicker').datetimepicker({
    //     format: 'LT'
    // });
})


function readFile(input) {
    if (input.files && input.files[0]) {
        
        var FileSize = input.files[0].size / 1024 / 1024; // in MB
        var extension = input.files[0].name.substring(input.files[0].name.lastIndexOf('.')+1);
        
        if (FileSize > 2) {
            alert("Maxiumum Image Size Is 2 Mb.");
            input.value = '';
            return false;
        }
        else{
            if (extension == 'jpg' || extension == 'png' || extension == 'jpeg' || extension == 'docx' || extension == 'pdf' || extension == 'csv' || extension == 'xlsx') {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#imgProfile").attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
            else
            {
                alert("Only Allowed '.jpg' OR '.png' OR '.jpeg' OR '.docx' OR '.pdf' OR '.csv' OR '.xlsx' Extension ");
                input.value = '';
                return false;
            }
        }
    }
}

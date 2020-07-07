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
	$(".decimal-num").keydown(function (event) {

		if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190 || event.keyCode == 110) {

		} else {
			event.preventDefault();
		}
		
		if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
			event.preventDefault();

		if($(this).val().indexOf('.') !== -1 && event.keyCode == 110)
			event.preventDefault();

	});
	$(".numbers").keydown(function (event) {

		if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46) {

		} else {
			event.preventDefault();
		}

	});
})


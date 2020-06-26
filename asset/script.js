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
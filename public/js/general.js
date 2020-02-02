$(document).on('change', '#state', function () {
	var state = $(this).val();
	var formdata = {state:state};
	var url = $(this).parents('form').data('state-change-route');
	$.ajax({
		url: url,
		type: "GET",
		data: formdata,
		success: function(data){
			var div = $('#cities').parent();
			div.html(data);
			$('.new-select2').select2({ width: '100%' });
		}
	});
});

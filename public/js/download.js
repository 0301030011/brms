$('.download').on('click', function(event) {
	event.preventDefault();
	/* Act on the event */
	// $('#download-modal').modal();
	id=$(this).data('id');
	var url="http://"+window.location.host+"/brms/public/qrcode/zip";
	$.ajax({
		type: 'POST',
		url: url,
		data: {id:id},
		headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
	});
});
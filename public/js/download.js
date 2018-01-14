$('.download').on('click', function(event) {
	event.preventDefault();
	/* Act on the event */
	$('#download-modal').modal();
	id=$(this).data('id');
	var url="http://"+window.location.host+"/brms/public/qrcode/create";
	$.ajax({
		type: 'POST',
		url: url,
		data: {id:id},
		headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
		success: function (data)
		{
			var url=data.url;
			$('#download-modal').find('a').attr('href', url);
		},
		dataType:"JSON"
	});
});
/*Gloabl open upload modal*/
$('#upload').click(function(event) {
	$('#upload-modal').modal();
});

/*Gloable focus input*/
$('*').on('shown.bs.modal', function () {
	$(":input[name='name']").focus();
});
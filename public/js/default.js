/*Gloabl open upload modal*/
$('#upload').click(function(event) {
	$('#upload-modal').modal();
});

/*Gloable focus input*/
$('*').on('shown.bs.modal', function () {
	$(":input[name='name']").focus();
});

$('#user').on('click', function(event) {
	event.preventDefault();
	$(this).css('display', 'none');
	$('#logout').css('display', 'block');
});

$('#logout').on('mouseout', function(event) {
	event.preventDefault();
	$(this).css('display', 'none');
	$('#user').css('display', 'block');
});
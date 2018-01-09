@if (count($errors) > 0)
	<script>
		@foreach($errors->all() as $error)
			toastr.error('{{ $error }}');
		@endforeach
	</script>
@endif

@foreach (['info','success','warning','error'] as $msg)
	@if (session()->has($msg))
	<script>
		toastr.{{ $msg }}('{{ session()->get($msg) }}');
	</script>
	@endif
@endforeach
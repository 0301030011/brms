@foreach ($resources as $resource)
	<li class="userlist">
		<div class="username pull-left">{{ $resource->name }}</div>
		<div class="useremail pull-left">{{ $resource->type }}</div>
		<form class="pull-right" action="{{ route('resources.destroy',$resource->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<button class="btn btn-m btn-danger delete-btn">删除</button>
		</form>
		<div class="clearfix"></div>
	</li>
@endforeach
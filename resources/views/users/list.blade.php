<ul class="list-unstyled">
	@foreach ($users as $user)
		<li class="userlist">
			<div class="username pull-left">{{ $user->name }}</div>
			<div class="useremail pull-left">{{ $user->email }}</div>
			<div class="pull-right">
				<form action="{{ route('users.update',$user->id) }}" method="POST" style="display: inline;">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<button type="submit" class="btn btn-m btn-success per-btn">已审核</button>
				</form>
				<form action="{{ route('users.destroy',$user->id) }}" method="POST" style="display: inline;">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-m btn-danger del-btn">删除</button>
				</form>
			</div>
			<div class="clearfix"></div>
		</li>
	@endforeach
</ul>
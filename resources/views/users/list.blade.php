<ul class="list-unstyled">
	@foreach ($users as $user)
		<li class="userlist">
			<div class="username pull-left">{{ $user->name }}</div>
			<div class="useremail pull-left">{{ $user->email }}</div>
			<div class="pull-right">
				@if ($user->admin!=1 and Auth::user()->admin==1){{-- if this user is not admin will not show these button --}}
					@if ($user->status==1)
						<form action="{{ route('users.update',$user->id) }}" method="POST" style="display: inline;">
							{{ csrf_field() }}
							{{ method_field('PATCH') }}
							<button type="submit" class="btn btn-m btn-success per-btn">已审核</button>
						</form>
					@else
						<form action="{{ route('users.update',$user->id) }}" method="POST" style="display: inline;">
							{{ csrf_field() }}
							{{ method_field('PATCH') }}
							<button type="submit" class="btn btn-m btn-info per-btn">未审核</button>
						</form>
					@endif
				@endif
				@if ($user->admin!=1){{-- if this user is admin it can del and show the admin's icon --}}
					@if (Auth::user()->admin==1)
						<form action="{{ route('users.destroy',$user->id) }}" method="POST" style="display: inline;">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-m btn-danger del-btn">删除</button>
						</form>
					@endif
				@else
					<div class="admin">
						<span class="label label-default">超级管理员</span>
					</div>
				@endif
			</div>
			<div class="clearfix"></div>
		</li>
	@endforeach
</ul>
@foreach ($books as $book)
	<div class="books" style="background-image:url({{ $book->cover_path }});">
		<form action="{{ route('books.destroy',$book->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<a href="{{ route('bind.index') }}"><button type="button" class="btn btn-primary center-block">编辑</button></a>
			<a href=""><button type="button" class="btn btn-success center-block">查看</button></a>
			<button class="btn btn-danger center-block">删除</button>
		</form>
	</div>
@endforeach
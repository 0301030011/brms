@foreach ($books as $book)
	<div class="books" style="background-image:url({{ $book->cover_path }});">
		<form action="{{ route('books.destroy',$book->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<a href="{{ route('bind.edit', $book->id) }}"><button type="button" class="btn btn-primary center-block">编辑</button></a>
			<button type="button" data-id="{{ $book->id }}" class="btn btn-success center-block download">下载</button>
			<button type="submit" class="btn btn-danger center-block">删除</button>
		</form>
	</div>
@endforeach
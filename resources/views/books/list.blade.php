@foreach ($books as $book)
	<div class="books" style="background-image:url({{ $book->cover_path }});">
		<form action="{{ route('books.destroy',$book->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<button type="button" class="btn btn-primary center-block" onclick="window.location.href='{{ route('books.edit', $book->id) }}'">编辑</button>
			<button type="button" data-id="{{ $book->id }}" class="btn btn-success center-block download">下载</button>
			<button type="submit" class="btn btn-danger center-block">删除</button>
		</form>
	</div>
@endforeach
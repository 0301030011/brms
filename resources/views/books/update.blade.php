<div class="modal fade" id="update-modal" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<h3 class="modal-title">编辑图书</h3>
				<form class="form-horizontal" style="margin-top: 20px" action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data">
					{{ method_field('PATCH') }}
					{{ csrf_field() }}
					<div class="form-group">
						<label class="col-sm-2 control-label">图书名称:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="图书名称" name="name" value="{{ $book->name }}" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">图书编号:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="图书的ISBN码" name="isbn" value="{{ $book->isbn }}" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">图书封面:</label>
						<div class="col-sm-10">
							<input type="file" name="cover">
						</div>
					</div>
					<div class="pull-right">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						<button type="submit" class="btn btn-primary">修改</button>
					</div>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>
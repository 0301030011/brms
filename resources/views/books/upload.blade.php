<div class="modal fade" id="upload-modal" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<h3 class="modal-title">新建图书</h3>
				<form class="form-horizontal" style="margin-top: 20px" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="col-sm-2 control-label">图书名称:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="图书名称" name="name" {{ old('name') }} >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">图书编号:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="图书的ISBN码" name="isbn" {{ old('isbn') }} >
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
						<button type="submit" id="submit" class="btn btn-primary">上传</button>
					</div>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>
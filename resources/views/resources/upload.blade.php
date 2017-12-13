<div class="modal fade" id="upload-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<h3 class="modal-title">上传资源</h3>
				<form class="form-horizontal" style="margin-top: 20px" action="{{ route('resources.store') }}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="col-sm-2 control-label">文件名称:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" placeholder="文件名称">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">选择文件:</label>
						<div class="col-sm-10">
							<input type="file" name="resource">
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
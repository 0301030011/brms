<div class="modal fade" id="chapter-name" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<h3 class="modal-title">输入章名称</h3>
				<form class="form-horizontal" style="margin-top: 20px">
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" placeholder="图书名称" name="name" {{ old('name') }} >
						</div>
					</div>
					<div class="pull-right">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						<button type="submit" class="btn btn-primary">确定</button>
					</div>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>
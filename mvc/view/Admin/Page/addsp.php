<script type="text/javascript" charset="utf-8" async defer>
	$(function () {
		var input_file = document.getElementById('upload_files');
		var deleted_file_ids = [];
		var dynm_id = 0;
		$("#upload_files").change(function (event) {
			var len = input_file.files.length;

			for(var j=0; j<len; j++) {
				var src = "";
				var name = event.target.files[j].name;
				var mime_type = event.target.files[j].type.split("/");
				if(mime_type[0] == "image") {
					src = URL.createObjectURL(event.target.files[j]);
				}
				$('#preview_file_div').append("<div id='" + dynm_id + "' class='ic-sing-file file mt-4 mr-2 d-inline-block'><img class='rounded-sm' width='100' height='100' id='" + dynm_id + "' src='"+src+"' title='"+name+"'><p class='p-1 close f rounded-circle d-inline-block' id='" + dynm_id + "'><i class='fa fa-times'></i></p></div>");
				dynm_id++;
			}
		});

		$(document).on('click','p.close', function() {
			var id = $(this).attr('id');
			$('div#'+id).remove();
			if($('div.ic-sing-file').length == 0) 
			{
				document.getElementById('upload_files').value="";
				var id = "none";
			}
			$.post("./mvc/core/xuly_ajax.php",
			{
				id_remove : id,
			},
			function(data,status)
			{
				if (status == 'success' && id == 'none') {
					$('#preview_file_div').html(data);
				}
			});
		});
		$(document).on('click','#upload', function() {
			var id = $(this).attr('id');
			$.post("./mvc/core/xuly_ajax.php",
			{
				upload : id,
			},
			function(data,status){
			});
		});
	});
</script>
<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	<h3 class="text-center m-3 ">Thêm Sản Phẩm</h3>
	<div class="mb-5 d-block">
		<button class="float-right btn btn-outline-success  mt-4 pl-4 pr-4 " type="submit" name="addsp" value="">Thêm</button>
	</div>
	<div class="clearfix"></div>
	<div class="row mt-5">
		<div class="col-6">
			<div class="input-group">
				<label for="upload_files" id = 'upload' class="btn btn-success mr-2 upload"><i class="fa fa-upload"></i>
					<input class="d-none" type="file" name="upload_files[]" id="upload_files" class="form-control" value="Upload" multiple="multiple"> 
				</label>
			</div>
			<div class="col-lg-12 mt-5" id="preview_file_div"></div>
		</div>
		<div class="col-6">
			<div class="form-group">
				<label class="font-weight-bold">Mã Sản Phẩm</label>
				<input type="text" class="form-control" name="masp" >
			</div>
			<div class="form-group">
				<label class="font-weight-bold">Tên Sản Phẩm</label>
				<input type="text" class="form-control" name="tensp" >
			</div>
			<div class="form-group">
				<label class="font-weight-bold">Giá</label>
				<input type="text" class="form-control" name="gia"  >
			</div>
			<div class="form-group">
				<label class="font-weight-bold">Số Lượng</label>
				<input type="text" class="form-control" name="sl" >
			</div>
			<div class="form-group">
				<label class="font-weight-bold">Khuyến Mãi</label>
				<input type="text" class="form-control" name="km"  >
			</div>
		</div>
	</div>
	<textarea id="editor1" name="chitiet"></textarea>
</form>
</div>
<script>
	CKEDITOR.replace( 'editor1' );
</script>


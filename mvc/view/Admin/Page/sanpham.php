<script>
	$(document).ready(function(){
		$('.edit').click(function () {
			var id = $(this).attr('id');
			
			$.post("./mvc/core/xuly_ajax.php",
			{
				edit_id : id,
			},
			function(data,status)
			{
				if (status == 'success') 
				{
					$('.save').val(id);
					$('#form').html(data);
				}
			});
		});
	});
</script>
<script type="text/javascript" charset="utf-8" async defer>
	$(function () {
		var input_file = document.getElementById('upload_files');
		var deleted_file_ids = [];
		var dynm_id = 0;
		$("#upload_files").change(function (event) {
			var len = input_file.files.length;
			$('#preview_file_div').html("");

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
			if($('div.ic-sing-file').length == 0 ) 
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
		$("#search").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tbody tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>
<h3 class="text-sm-center mb-lg-4 mt-5">DANH SÁCH SẢN PHẨM</h3>
<div class="row">
	<div class="form-group col-4">
		<input class="form-control" id = "search" type="search" name="search"  placeholder="Tìm Kiếm">
	</div>
	<?php if (isset($data['id'])): ?>
		<div class="col-8 text-right">
			<a href="Admin/Add_Product/<?php echo $data['id'] ?>" class="rounded rounded-circle btn btn-success text-light pl-lg-2 pr-lg-2 pt-1 pb-1"><i class="fa fa-plus"></i></a>
		</div>
	<?php endif ?>
</div>

<table class="table table-striped table-bordered table-condensed mt-5 align-middle" id="myTable">
	<thead>
		<tr align="center">
			<th>STT</th>
			<th>Mã Sản Phẩm</th>
			<th>Ảnh</th>
			<th>Tên Sản Phẩm</th>
			<th>Chức Năng</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$stt = 1;
		while ($row = mysqli_fetch_array($data['sp'])) 
			{ ?>
				<tr align="center">
					<td valign="middle"><?php echo $stt; ?></td>
					<td valign="middle"><?php echo $row['masp'] ?></td>
					<td>
						<?php
						if (!empty($row['anh']) && $row['anh'] != 'null') 
						{
							{ ?>
								<img class='rounded-sm' width='100' height='100' src="public/images/<?php echo $row['anh']; ?>" alt="">
								<?php 
							}
						} 
						else 
						{
							echo "<h4 class='text-danger'>Trống</h4>";
						} ?>
					</td>
					<td valign="middle"><?php echo $row['tensp']; ?></a></td>
					<td valign="middle">
						<a href="Admin/Edit_Product/<?php echo $row['masp'] ?>" class="btn btn-primary pl-lg-4 pr-lg-4 pt-1 pb-1">Edit</a>
						<a class="btn btn-danger pl-lg-3 pr-lg-3 pt-1 pb-1" href="Admin/Delete/sanpham/<?php echo $row['masp']; ?>/masp/Product" onClick="return confirm('Bạn có muốn xóa danh mục <?php echo $row['tensp']; ?>?')">
							Delete
						</a>
					</td>
				</tr>
				<?php $stt++; 
			} ?>
		</tbody>
	</table>
<?php 
while ($row = mysqli_fetch_array($data['sp'])) { $_SESSION['ing'] = $row['anh'] ?>
	<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
		<h3 class="text-center m-3 ">Thêm Sản Phẩm</h3>
		<div class="mb-5 d-block">
			<button class="float-right btn btn-outline-success  mt-4 pl-4 pr-4 " type="submit" name="editsp" value="<?php echo $data['id'] ?>">Edit</button>
		</div>
		<div class="clearfix"></div>
		<div class="row mt-5">
			<div class="col-6">
				<div class="col-lg-12 mt-5" >
					<div class="mt-4 up text-center rounded-sm ">
						<img id="img-tag" src="public/images/<?php echo $row['anh'] ?>" class="rounded-sm" width="304" height="250"/>
						<div class="container-fluid p-0 text-center bg-dark h-100 w-100 f">
							<label for="file-input" >
								<i class="fas fa-camera mt-lg-4 text-light" ></i>
							</label>
						</div>
					</div>
					<input id="file-input" type="file" name="upload" />
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label class="font-weight-bold">Mã Sản Phẩm</label>
					<input type="text" class="form-control" name="masp" value="<?php echo $row['masp'] ?>"	>
				</div>
				<div class="form-group">
					<label class="font-weight-bold">Tên Sản Phẩm</label>
					<input type="text" class="form-control" name="tensp" value="<?php echo $row['tensp'] ?>">
				</div>
				<div class="form-group">
					<label class="font-weight-bold">Giá</label>
					<input type="text" class="form-control" name="gia" value="<?php echo $row['gia'] ?>" >
				</div>
				<div class="form-group">
					<label class="font-weight-bold">Số Lượng</label>
					<input type="text" class="form-control" name="sl" value="<?php echo $row['sl'] ?>" >
				</div>
				<div class="form-group">
					<label class="font-weight-bold">Khuyến Mãi</label>
					<input type="text" class="form-control" name="km" value="<?php echo $row['khuyenmai'] ?>" >
				</div>
				<div class="form-group">
					<label class="font-weight-bold">ID Danh Mục</label>
					<select name="iddm" class="form-control">
						<?php while ($dm=mysqli_fetch_array($data['danhmuc'])) { ?>
							<option class="text-dark" <?php if($dm['iddanhmuc'] == $row['iddanhmuc']) {echo 'selected="selected"'; }?> value="<?php echo $dm['iddanhmuc'] ?>">
								<?php echo $dm['tendanhmuc'] ?>
							</option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<textarea id="editor1" name="chitiet"><?php echo $row['chitiet'] ?></textarea>
	</form>
	<?php 
}  ?>
<script type="text/javascript" charset="utf-8" async defer>
	CKEDITOR.replace( 'editor1' );
	CKEDITOR.config.height = '25em';

	function readURL(input) 
	{
		if (input.files && input.files[0]) 
		{
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#img-tag').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#file-input").change(function()
	{
		readURL(this);
	});
</script>
<?php if (isset($_SESSION['thongbao']) && !empty($_SESSION['thongbao'])) {
	?>
	<div class="alert alert-success">
		<?php echo $_SESSION['thongbao']; $_SESSION['thongbao'] = '';
		?>
	</div>
	<?php 		
} ?>
<?php if (isset($_SESSION['loi']) && !empty($_SESSION['loi'])) {
	?>
	<div class="alert alert-danger">
		<?php echo $_SESSION['loi']; $_SESSION['loi'] = '';
		?>
	</div>
	<?php 		
} ?>
<h3 class="text-sm-center mb-lg-4 mt-5">DANH SÁCH DANH MỤC</h3>
<div class="mb-lg-2 float-md-right">
	<a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal" class="rounded rounded-circle btn btn-success text-light pl-lg-2 pr-lg-2 pt-1 pb-1"><i class="fa fa-plus"></i></a>
</div>
<table class="table table-striped table-bordered table-condensed mt-5">
	<tr align="center">
		<th>STT</th>
		<th>ID Danh Mục</th>
		<th>Tên Danh Mục</th>
		<th>Chức Năng</th>
	</tr>
	<?php
	$stt = 1;
	while ($row = mysqli_fetch_array($data['dm'])) 
	{
		?>
		<tr align="center">
			<td><?php echo $stt; ?></td>
			<td><?php echo $row['iddanhmuc']; ?></td>
			<td><a href="Admin/Product/<?php echo $row['iddanhmuc']; ?>" title=""><?php echo $row['tendanhmuc']; ?></a></td>
			<td>
				<a href="#" class="btn btn-primary pl-lg-4 pr-lg-4 pt-1 pb-1" data-toggle="modal" data-target="#exampleModalCenter<?php echo $stt; ?>">Edit</a>
				<a class="btn btn-danger pl-lg-3 pr-lg-3 pt-1 pb-1" href="Admin/Delete/danhmuc/<?php echo $row['iddanhmuc']; ?>/iddanhmuc/Category/" onClick="return confirm('Bạn có muốn xóa danh mục <?php echo $row['tendanhmuc']; ?>?')">
					Delete
				</a>
			</td>
		</tr>
		<div class="modal fade" id="exampleModalCenter<?php echo $stt; ?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class=" mx-auto mw-100 col-lg-5">
							<h5 class="text-center mb-4 font-weight-bold">Chỉnh Sửa Danh Mục</h5>
							<form  action="" method="post">
								<div class="form-group">
									<label class="font-weight-bold">Id Danh Mục</label>
									<input type="text" class="form-control" name="id" value="<?php echo $row['iddanhmuc'] ?>">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Tên Danh Mục</label>
									<input type="text" class="form-control" name="name" value="<?php echo $row['tendanhmuc'] ?>">
								</div>
								<button type="submit" class="btn btn-success d-block mt-md-5 ml-auto w-25"  name="editdm" value="<?php echo $row['iddanhmuc']; ?>">Save
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$stt++;
	}?>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="p-2" action="" method="post">
				<div class="modal-body">

					<div class="form-group">
						<label class="font-weight-bold">ID Danh Mục</label>
						<input type="text" class="form-control" name="id" value="">
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Tên Danh Mục</label>
						<input type="text" class="form-control" name="name" value="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success w-25"  name="add">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>


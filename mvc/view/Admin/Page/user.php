<script type="text/javascript" >
	$(document).ready(function(){
		$("#search").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tbody tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>
<?php if (isset($_SESSION['thongbao']) && !empty($_SESSION['thongbao'])) {
	?>
	<div class="alert alert-success">
		<?php echo $_SESSION['thongbao'];
		$_SESSION['thongbao']=''; ?>
	</div>
	<?php 		
} ?>

<h3 class="text-sm-center mb-lg-4 mt-5">DANH SÁCH TÀI KHOẢN</h3>
<div class="row">
	<div class="form-group col-4">
		<input class="form-control" id = "search" type="search" name="search"  placeholder="Tìm Kiếm">
	</div>
</div>
<table class="table table-striped table-bordered table-condensed mt-5" id="myTable">
	<thead>
		<tr align="center">
			<th>STT</th>
			<th>Tên Khách Hàng</th>
			<th>Giới Tính</th>
			<th>Ngày Sinh</th>
			<th>Email</th>
			<th>Password</th>
			<th>Chức Năng</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$stt = 1;
		while ($row=mysqli_fetch_array($data['User'])) { ?>
			<tr align="center">
				<td><?php echo $stt; $stt++; ?></td>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo $row['gt']; ?></td>
				<td>
					<?php $date=date_create($row['birth']);
					echo date_format($date,"d/m/Y"); ?>
				</td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo md5($row['password']); ?></td>
				<td>
					<a class="btn btn-danger pl-lg-3 pr-lg-3 pt-1 pb-1" href="Admin/Delete/account/<?php echo $row['id']; ?>/Account" onClick="return confirm('Bạn có muốn xóa sinh viên  <?php echo $row['name']; ?>?')">Delete</a>
				</td>
			</tr>
		<?php }?>
	</tbody>
</table>
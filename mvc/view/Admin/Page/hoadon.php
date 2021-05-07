<style type="text/css" media="screen">
	p.btn {
		cursor: pointer;
	}
</style>
<script type="text/javascript" >
	$(document).ready(function(){
		$('select.form-control').change( function() {
			var select = $(this).val();
			if (select.trim() != '1') {
				$("#search").attr("type","search");
				$("#last").hide();
			}
			else
			{
				$("#search").attr("type","date");
				$("#last").show();
			}
		});
		$("#search,#last").change( function() {
			var select = $('select.form-control').val();
			var search = $('#search').val();
			var last = $("#last").val();
			$.post("./mvc/core/xuly_ajax.php",
			{
				v_search : search,
				date : select,
				last : last,
			},
			function(data,status){
				if (status == 'success') {
					$('#myTable tbody').html(data);

				}
			});
		});
		$(document).on('click','div#tt',function(){
			var id = $(this).attr('class');
			var nd = $(this).text();
			var gia = Number($(this).attr('gia'));
			var tong = Number($('#dt').attr('dt'));
			var ss = 'Success';

			if (nd.trim() == ss) 
			{
				tong = tong - gia;
			}
			else
			{
				tong = tong + gia;
			}

			var value = tong.toLocaleString(undefined, { minimumFractionDigits: 3 });

			$.post("./mvc/core/xuly_ajax.php",
			{
				id_update_status : id,
				nd_update : nd,
			},
			function(data,status){
				if (status == 'success') 
				{
					$('.'+id).html(data);
					$('#editdt').html("<h5 id='dt' dt='"+tong+"' class='text-success m-0'>"+value+" VND</h5>");
				}
			});
		});
	});
</script>
<h3 class="text-sm-center mb-lg-4 mt-5">THÔNG TIN HÓA ĐƠN</h3>
<div class="row">
	<div class="col-3">
		<select  class="form-control" name="date">
			<option value="1">Ngày</option>
			<option value="2">Tháng</option>
			<option value="3">Năm</option>
			<option value="4">Tuần</option>
		</select>
	</div>
	<div class="col-3">
		<input class="form-control" id = "search" type="date" name="search"  placeholder="Tìm Kiếm">
	</div>
	<div class="col-3">
		<input class="form-control" id = "last" type="date" name="search"  placeholder="Tìm Kiếm">
	</div>
</div>
<table class="table table-striped table-bordered mt-5" id="myTable">
	<thead>
		<tr align="center">
			<th>STT</th>
			<th>ID Hóa Đơn</th>
			<th>ID Khách Hàng </th>
			<th>Ngày Mua</th>
			<th>Trạng Thái</th>
			<th>Tổng Tiền</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$status = '';
		$stt = 1;
		$_SESSION['danhthu'] = 0;
		while ($row=mysqli_fetch_array($data['hoadon'])) { 
			if ($row['trangthai'] == 'Active') 
			{
				$status = 'danger';
			}
			else
			{
				$status = 'success';
				$_SESSION['danhthu'] += ((int)$row['tongtien']);
			}
			?>
			<tr align="center">
				<td><p><?php echo $stt; $stt++;?></p></td>
				<td><p><?php echo $row['id']?></p></td>
				<td><?php echo $row['idkhachhang'] ?></td>
				<td><?php echo $row['ngaytao']; ?></td>
				<td>
					<div id ="tt" class="<?php echo $row['id']; ?>" gia = "<?php echo $row['tongtien'] ?>">
						<p class="btn btn-<?php echo $status; ?>">
							<?php echo $row['trangthai']; ?>
						</p>
					</div>
				</td>
				<td><?php echo number_format($row['tongtien'],3); ?></td>

			</tr>
		<?php } ?>
		<tr class='bg-light' >
			<th colspan='2' >Tổng Số Hóa Đơn</th>
			<td align='center'><h5 class='m-0'><?php echo $stt-1; ?></h5></td>
			<th colspan='2' >DOANH THU</th>
			<td id= "editdt" align='center'><h5 id='dt' dt='<?php echo $_SESSION['danhthu'] ?>' class='text-success m-0'><?php echo number_format($_SESSION['danhthu'],3).' VND' ?></h5></td>
		</tr>
	</tbody>
</table>
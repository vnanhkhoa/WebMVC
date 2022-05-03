<?php 
session_start();
$con = new mysqli('localhost', 'root', '', 'qlbg') or die(mysqli_error($con));
mysqli_set_charset($con, 'UTF8');

if(isset($_POST['id_remove'])) 
{
	if ($_POST['id_remove'] != 'none') 
	{
		$_SESSION['id_remove'][] = $_POST['id_remove'];

	}
	else
	{
		unset($_SESSION['id_remove']);
		echo 'None';
	} 
}

if(isset($_POST['upload']))
{
	$_SESSION['id_remove'] = array();
}
if (isset($_POST['v_search'])) 
{
	$stt = 1;
	$tong = 0;
	switch ($_POST['date']) {
		case '1':
		if (empty($_POST['last'])) 
		{
			$sql = "SELECT * FROM `hoadon` WHERE DATE(`ngaytao`) ='".$_POST['v_search']."'";
		}
		else 
		{
			$first = $_POST['v_search'];
			$last = $_POST['last'];
			$sql = "SELECT * FROM hoadon WHERE DATE(`ngaytao`) between '$first' and '$last'";
		}
		
		break;
		case '2':

		$sql = "SELECT * FROM `hoadon` WHERE MONTH(`ngaytao`) =".$_POST['v_search'];
		break;

		case '3':

		$sql = "SELECT * FROM `hoadon` WHERE YEAR(`ngaytao`) =".$_POST['v_search'];
		
		break;
		case '4':

		$sql = "SELECT * FROM `hoadon` WHERE WEEK(`ngaytao`) =".$_POST['v_search'];
		
		break;

	}
	if (empty($_POST['v_search'])) {
		$sql = "SELECT * FROM `hoadon`";
	}
	$status = '';
	$stt = 1;
	$ketqua = $con->query($sql) or die($con->error);
	while ($row=mysqli_fetch_array($ketqua)) 
	{
		
		if ($row['trangthai'] == 'Chưa Thanh Toán') 
		{
			$status = 'danger';
		}
		else
		{
			$status = 'success';
			$tong += (int)$row['tongtien'];
		}
		?>
		?>
		<tr align="center">
			<td ><?php echo $stt; $stt++; ?></td>
			<td><?php echo $row['id'] ?></td>
			<td><?php echo $row['idkhachhang'] ?></td>
			<td><?php echo $row['ngaytao']; ?></td>
			<td>
				<div id ="tt" class="<?php echo $row['id']; ?>" gia="<?php echo $row['tongtien']?>">
					<p class="btn btn-<?php echo $status; ?>">
						<?php echo $row['trangthai']; ?>
					</p>
				</div>
			</td>
			<td><?php echo number_format($row['tongtien'],3); ?></td>
		</tr>
		<?php 
	}
	echo "<tr class='bg-light' >
	<th colspan='2' >Tổng Số Hóa Đơn</th>
	<td align='center'><h5 class='m-0'>".($stt-1)."</h5></td>
	<th colspan='2' >DOANH THU</th>
	<td id= 'editdt' align='center'><h5 id='dt' dt='".$tong."' class='text-success m-0'>".number_format($tong,3)."  VND</h5></td>
	</tr>";

}

if (isset($_POST['id_update_status'])) 
{
	$coler = '';
	if (trim($_POST['nd_update']) == "Active") 
	{
		$_POST['nd_update'] = "Success";
		$coler = 'success'; 
	}
	else 
	{
		$_POST['nd_update'] = 'Active';
		$coler = 'danger'; 
	}
	$sql = "UPDATE `hoadon` SET `trangthai`= '".trim($_POST['nd_update'])."',ngaytao=ngaytao WHERE id ='".$_POST['id_update_status']."'";
	if ($con->query($sql) or die($con->error))
	{
		?>
		<p class="btn btn-<?php echo $coler; ?>"  >
			<?php echo $_POST['nd_update'];  ?>
		</p>
		<?php
	}
}

if (isset($_POST['delete'])) {
	unset($_SESSION['cart']);
	unset($_SESSION['gia']);
}

if (isset($_POST['delete_item'])) {
	unset($_SESSION['cart'][$_POST['delete_item']]);
	if (empty($_SESSION['cart'])) {
		unset($_SESSION['cart']);
		unset($_SESSION['gia']);
	}
}
if (isset($_POST['edit_qty'])) {	
	if ($_POST['edit_qty'] != 0) 
	{
		$_SESSION['cart'][$_POST['id_ed']] = $_POST['edit_qty'];
	}
	else 
	{
		unset($_SESSION['cart'][$_POST['id_ed']]);	
	}
}

if (isset($_POST['qty'])) 
{
	$id = $_POST['id_cart'];
	if(isset($_SESSION['cart'][$id]))
	{
		$qty = $_SESSION['cart'][$id] + $_POST['qty'];
	}
	else
	{
		$qty = $_POST['qty'];
	}
	$_SESSION['cart'][$id]=$qty;
}
if (isset($_POST['email_pay'])) {
	$sql = "select * from khachhang where email='".$_POST['email_pay']."'";
	$ketqua = $con->query($sql) or die($con->error);
	if (mysqli_num_rows($ketqua) == 1) 
	{
		$row = mysqli_fetch_array($ketqua);
		echo $row['idkhachhang'];
	}
	else 
	{
		echo "0";
	}
}
if (isset($_POST['email_signup'])) {
	$sql = "select * from account where email='".$_POST['email_signup']."'";
	$ketqua = $con->query($sql) or die($con->error);
	if (mysqli_num_rows($ketqua) == 1) 
	{
		echo 1;
	}
}
if (isset($_POST['email_lg'])) {
	if ($_POST['email_lg'] !='admin' && $_POST['password'] != '123') {
		$sql = "select * from account where email='".$_POST['email_lg']."' and password='".$_POST['password']."'";
		$ketqua = $con->query($sql) or die($con->error);
		if (mysqli_num_rows($ketqua) <= 0) 
		{
			echo 1;
		}
	}
}
?>

<?php
if (isset($_POST['id_dm']))
{ 
	if (empty($_POST['id_dm'])) 
	{
		$sql = "SELECT * FROM sanpham";
	}
	else
	{
		$sql = "SELECT * FROM `sanpham` where iddanhmuc in (".$_POST['id_dm'].")";
	}
	$ketqua = $con->query($sql) or die($con->error);
	while ($row=mysqli_fetch_array($ketqua)) 
	{
		if (empty($row['khuyenmai'])) 
		{
			$km = 1;
		}
		else 
		{
			$km = 1-(float)$row['khuyenmai']/100;
		}
		?>
		<div class="col-md-4 grid-stn simpleCart_shelfItem">
			<div class="ih-item square effect3 bottom_to_top">
				<div class="bottom-2-top">
					<div class="img"><img style="height: 278px;" src="public/images/<?php echo $row['anh'] ?>" alt="/" class="img-responsive gri-wid"></div>
					<div class="info">
						<div class="pull-left styl-hdn">
							<h3><?php echo $row['tensp'] ?></h3>
						</div>
						<div class="pull-right styl-price">
							<p>
								<form action="" method="POST" accept-charset="utf-8">
									<button value="<?php echo $row['masp'] ?>" type='submit' name="cart" class="item_add btn btn-light"><span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span>$<span class="item_price"><?php echo number_format($row['gia']*$km,3) ?></span>
									</button>
								</form>
							</p>
						</div>
						<div class="clearfix"></div>
					</div></div>
				</div>
				<div class="quick-view">
					<a href="single.html">Quick view</a>
				</div>
			</div>
			<?php 
		}
	} 
	?>
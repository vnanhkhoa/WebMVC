<?php 
class Home extends Controller
{

	function Show()
	{
		$home = $this->model('Product_Model');

		$this->view("layout", [
			'Page'=>'home',
			'sp'=>$home->SP_rand('6')
		]);
	}

	function Product()
	{
		$home = $this->model('Product_Model');

		$this->view("layout", [
			'Page'=>'product',
			'sp'=>$home->SELECT('sanpham'),
			'dm'=>$home->SELECT('danhmuc'),
		]);
	}

	function Checkout()
	{
		$home = $this->model('Product_Model');

		$this->view("layout", [
			'Page'=>'checkout',
			'sp'=>$home->SP_rand('6')
		]);
	}

	function Product_id($id)
	{
		$home = $this->model('Product_Model');
		$this->view("layout", [
			'Page'=>'spct',
			'sp'=>$home->SP_rand('3'),
			'ct'=>$home->SELECT_id('Sanpham',$id,'masp'),
		]);
	}

	function Pay()
	{
		$home = $this->model('Product_Model');
		if (isset($_POST['pay']) ) 
		{
			if ($_POST['pay'] == '0') 
			{
				$name = $_POST['name'];
				$gender = $_POST['gender'];
				$birth = $_POST['birth'];
				$add = $_POST['add'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];

				$home->insert_kh($name,$birth,$gender,$email,$add,$phone);
				$idkh = $home->Sum('khachhang','idkhachhang');
			}
			else
			{
				$idkh = $_POST['pay'];
				
			}
			$home->insert_hd($idkh,$_SESSION['gia']);
			$idhd = $home->Sum('hoadon','id');	
			foreach ($_SESSION['cart'] as $key => $value) 
			{
				$arr_sql[] = "('" . $idhd . "','" . $key . "', '" . $value. "')";
			}
			$value_string = implode(",", $arr_sql);
			$home->insert_hdct($value_string);
			unset($_SESSION['cart']);
			unset($_SESSION['gia']);
			$_SESSION['thanhtoan'] = "Thanh Toán Thành Công";
			header("Location: http://localhost/WebNC");
		}
		$this->view("layout", [
			'Page'=>'pay',
		]);
	}
}
?>
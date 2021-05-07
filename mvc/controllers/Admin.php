<?php 
class Admin extends Controller
{

	function Show()
	{
		$home = $this->model('Admin_Model');

		$this->view("Admin/layoutad", [
			'Page'=>'homead',
			'User'=>$home->Sum_User(),
		]);
	}

	function Account()
	{
		$home = $this->model('Admin_Model');

		$this->view("Admin/layoutad", [
			'Page'=>'user',
			'User'=>$home->SELECT('account'),
		]);
	}

	function Delete($table,$id,$col,$page)
	{
		$user = $this->model('Admin_Model');

		if ($user->Delete($table,$id,$col)) 
		{
			header('Location: '.$_SERVER["HTTP_REFERER"]);
		}
	}

	function Category()
	{
		$cate = $this->model('Admin_Model');

		if (isset($_POST['add'])) {

			$id = $_POST['id'];
			$name = $_POST['name'];

			if ($cate->insert_dm($id,$name)) 
			{
				header('Location: http://localhost/WebNC/Admin/Category/');
			}
		}

		if (isset($_POST['editdm'])) {

			$id = $_POST['id'];
			$name = $_POST['name'];

			if ($cate->update_dm($id,$name,$_POST['editdm'])) 
			{
				header('Location: http://localhost/WebNC/Admin/Category/');	
			}
		}

		$this->view("Admin/layoutad", [
			'Page'=>'danhmuc',
			'dm'=>$cate->SELECT('danhmuc')
		]);
	}

	function Product($id)
	{
		$home = $this->model('Admin_Model');

		$this->view("Admin/layoutad", [
			'Page'=>'sanpham',
			'sp'=>$home->Select_id('sanpham',$id,'iddanhmuc'),
			'id'=>$id,
		]);
	}

	function Customer()
	{
		$home = $this->model('Admin_Model');

		$this->view("Admin/layoutad", [
			'Page'=>'khachhang',
			'kh'=>$home->SELECT('khachhang'),
		]);
	}

	function Add_Product($id)
	{
		$home = $this->model('Admin_Model');

		if (isset($_POST['addsp'])) 
		{
			$masp = $_POST['masp'];
			$tensp = $_POST['tensp'];			
			$gia = $_POST['gia'];
			$sl = $_POST['sl'];
			$km = $_POST['km'];
			$chitiet = $_POST['chitiet'];

			for($i=0; $i<sizeof($_FILES['upload_files']['name']); $i++) {
				if(!in_array($i, $_SESSION['id_remove'])) {
					if($_FILES['upload_files']['name'][$i] != "") {
						$location = 'public/images/'.$_FILES['upload_files']['name'][$i];
						if (!file_exists($location)) 
						{
							if(move_uploaded_file($_FILES['upload_files']['tmp_name'][$i], $location)){
								$anh = $_FILES['upload_files']['name'][$i];
							}
						} 
						else 
						{
							$anh = $_FILES['upload_files']['name'][$i];
						}
					}
				}
			} 

			if ($home->insert_sp($masp,$tensp,$gia,$km,$sl,$anh,$id,$chitiet)) 
			{
				unset($_SESSION['id_remove']);
				header("Location: http://localhost/WebNC/Admin/Product/".$id);
			}
		}
		
		$this->view("Admin/layoutad", [
			'Page'=>'addsp',
			'sp'=>$home->Select_id('sanpham',$id,'masp'),
			'id'=>$id,
		]);
	}

	function Edit_Product($id)
	{
		$home = $this->model('Admin_Model');

		if (isset($_POST['editsp'])) 
		{
			$masp = $_POST['masp'];
			$tensp = $_POST['tensp'];			
			$gia = $_POST['gia'];
			$sl = $_POST['sl'];
			$km = $_POST['km'];
			$chitiet = $_POST['chitiet'];
			$iddm = $_POST['iddm'];

			if (!empty($_FILES['upload']['name'])) 
			{
				$location = 'public/images/'.$_FILES['upload']['name'];
				if(!file_exists($location))
				{
					if(move_uploaded_file($_FILES['upload']['tmp_name'], $location))
					{
						$img = $_FILES['upload']['name'];
					}
				}
				else 
				{
					$img = $_FILES['upload']['name'];
				}
			}
			else
			{
				$img = $_SESSION['ing'];
			}

			if ($home->update_sp($masp,$tensp,$gia,$km,$sl,$img,$iddm,$chitiet,$_POST['editsp'])) 
			{
				unset($_SESSION['upload']);
				header("Location: http://localhost/WebNC/Admin/Product/".$iddm);
			}
		}
		
		$this->view("Admin/layoutad", [
			'Page'=>'editsp',
			'sp'=>$home->Select_id('sanpham',$id,'masp'),
			'danhmuc'=>$home->SELECT('danhmuc'),
			'id'=>$id,
		]);
	}

	function Product_All()
	{
		$home = $this->model('Admin_Model');

		$this->view("Admin/layoutad", [
			'Page'=>'sanpham',
			'sp'=>$home->Select('sanpham'),
		]);
	}

	function Bill()
	{
		$home = $this->model('Admin_Model');

		$this->view("Admin/layoutad", [
			'Page'=>'hoadon',
			'hoadon'=>$home->Select('hoadon'),
		]);
	}
}
?>
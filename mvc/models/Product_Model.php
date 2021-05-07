<?php 
class Product_Model extends DB
{
	public function Sum($table,$col)
	{
		$sql = "SELECT COUNT(`$col`) FROM `$table`";
		$kq = mysqli_query($this->con, $sql);
		$row = mysqli_fetch_assoc($kq);
		return (int)$row['COUNT(`'.$col.'`)'];
	}
	public function SP_rand($sl)
	{
		$sql = 'Select * from sanpham ORDER BY RAND() LIMIT '.$sl;
		return mysqli_query($this->con, $sql);
	}

	public function SELECT($table)
	{
		$sql = "select * from ".$table;
		return mysqli_query($this->con, $sql);
	}

	public function SELECT_id($table,$id,$col)
	{
		$sql = "select * from ".$table." where $col = '$id'";
		return mysqli_query($this->con, $sql);
	}

	public function insert_kh($tenkhachhang,$date,$gender,$email,$add,$phone)
	{
		$sql = "INSERT INTO `khachhang`(`tenkhachhang`, `gt`, `ngaysinh`, `email`, `diachi`, `sdt`) VALUES ('".$tenkhachhang."', '".$gender."', '".$date."', '".$email."', '".$add."', '".$phone."')";
		return mysqli_query($this->con, $sql) or die($this->con->error);
	}

	public function insert_hd($idkhachhang,$tongtien)
	{
		$sql = "INSERT INTO `hoadon`(`idkhachhang`, `trangthai`, `tongtien`) VALUES ('".$idkhachhang."', 'Active', '".$tongtien."')";
		return mysqli_query($this->con, $sql) or die($this->con->error);
	}

	public function insert_hdct($value)
	{
		$sql = "INSERT INTO `hoadonchitiet`(`idhoadon`, `masp`, `sl`)  VALUES $value";
		return mysqli_query($this->con, $sql) or die($this->con->error);
	}
}

?>
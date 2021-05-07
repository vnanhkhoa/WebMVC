<?php 
class Admin_Model extends DB
{
	public function Sum_User()
	{
		$sql = "SELECT COUNT(`id`) FROM `account`";
		$kq = mysqli_query($this->con, $sql);
		$row = mysqli_fetch_assoc($kq);
		return $row['COUNT(`id`)'];
	}

	public function Delete($table,$id,$col)
	{
		$sql = "DELETE FROM ".$table." where $col='".$id."'";
		return mysqli_query($this->con, $sql) or die($this->con->error);
	}

	public function SELECT($table)
	{
		$sql = "select * from ".$table;
		return mysqli_query($this->con, $sql);
	}	

	public function insert_dm($iddanhmuc,$tendanhmuc)
	{
		$sql = "INSERT INTO `danhmuc`( `iddanhmuc`, `tendanhmuc`) VALUES ('".$iddanhmuc."','".$tendanhmuc."')";
		return mysqli_query($this->con, $sql);
	}

	public function update_dm($iddanhmuc,$tendanhmuc,$id)
	{
		$sql = "UPDATE `danhmuc` SET `iddanhmuc`='".$iddanhmuc."',`tendanhmuc`='".$tendanhmuc."' WHERE danhmuc.iddanhmuc='".$id."'";
		return mysqli_query($this->con, $sql);
	}

	public function Select_id($table,$id,$col)
	{
		$sql = "select * from ".$table." where ".$col."='".$id."'";
		return mysqli_query($this->con, $sql);
	}

	public function insert_sp($masp,$tensp,$gia,$km,$sl,$anh,$iddm,$ct)
	{
		$sql = "INSERT INTO `sanpham`(`masp`, `tensp`, `gia`, `khuyenmai`, `sl`, `anh`, `iddanhmuc`, `chitiet`) VALUES ('".$masp."','".$tensp."','".$gia."','".$km."','".$sl."','".$anh."','".$iddm."','".$ct."')";
		return mysqli_query($this->con, $sql) or die($this->con->error) ;
	}

	public function update_sp($masp,$tensp,$gia,$km,$sl,$anh,$iddm,$ct,$idsp)
	{
		$sql = "UPDATE `sanpham` SET `masp`='".$masp."',`tensp`='".$tensp."',`gia`='".$gia."',`khuyenmai`='".$km."',`sl`='".$sl."',`anh`='".$anh."',`iddanhmuc`='".$iddm."',`chitiet`='".$ct."' WHERE `masp`='".$idsp."'";
		return mysqli_query($this->con, $sql) or die($this->con->error) ;
	}
}
?>
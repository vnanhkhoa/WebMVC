<?php 
class Login_Model extends DB
{

	public function Login($email,$pass)
	{
		$sql = "select * from account where email='".$email."' and password='".$pass."'";
		return mysqli_query($this->con, $sql);
	}

	public function Sign_Up($name,$date,$gender,$email,$pass)
	{
		$sql = "INSERT INTO `account`(`name`, `birth`, `gt`, `email`, `password`) VALUES ('".$name."', '".$date."', '".$gender."', '".$email."', '".$pass."')";
		return mysqli_query($this->con, $sql);
	}	
}

?>
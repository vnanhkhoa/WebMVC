<?php 
class Login extends Controller
{ 
	function Show()
	{
		$login = $this->model('Login_Model');
		if (isset($_POST['login'])) 
		{
			$email = $_POST['email'];
			$pass = $_POST['pass'];

			if ($email == 'admin' && $pass == '123') 
			{
				header("Location: http://localhost/WebNC/Admin");
			}
			else
			{
				$num = $login->Login($email,$pass);	
				if (mysqli_num_rows($num) == 1) 
				{
					$row=mysqli_fetch_array($num);
					$_SESSION['user'] = $row['name'];
					header("Location: http://localhost/WebNC/");
				}
				else
				{
					
					$_SESSION['loi'] = "Account Doesn't Exist";
					$this->view("layout", [
						'Page'=>'login',
					]);
				}
			}
		}
		
		
		$this->view("layout", [
			'Page'=>'login',
		]);

		
	}  

	function Sign_in()
	{
		$signup = $this->model('Login_Model');
		if (isset($_POST['signup'])) 
		{
			$name = $_POST['name'];
			$birth = $_POST['birth'];
			$gender = $_POST['gender'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];

			if ($signup->Sign_Up($name,$birth,$gender,$email,$pass)) 
			{
				$_SESSION['thongbao'] = 'Sign Up Success';
				header("Location: http://localhost/WebNC/Login/");
			}
			else
			{
				$_SESSION['thongbao'] = 'Registration Failed';
				$this->view("layout", [
					'Page'=>'signup',
				]);
			}
		}
		else 
		{
			$this->view("layout", [
				'Page'=>'signup',
			]);
		}
		
	}

	function Logout()
	{	
		require_once './mvc/core/configh.php';
		unset($_SESSION['token']);
		unset($_SESSION['access_token']);
		$google_client->revokeToken();
		session_destroy();
		header("Location: http://localhost/WebNC/Login/");
	}
}
?>
<?php 
require_once './mvc/core/configh.php';
if(isset($_GET["code"]))
{
	$_SESSION['token'] = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

	if(!isset($_SESSION['token']['error']))
	{
		$google_client->setAccessToken($_SESSION['token']['access_token']);

		$_SESSION['access_token'] = $_SESSION['token']['access_token'];

		$google_service = new Google_Service_Oauth2($google_client);

		$data = $google_service->userinfo->get();

		if(!empty($data['given_name']))
		{
			$_SESSION['user'] = $data['given_name']." ".$data['family_name'];
		}

		if(!empty($data['email']))
		{
			$_SESSION['user_email'] = $data['email'];
		}

		if(!empty($data['gender']))
		{
			$_SESSION['gender'] = $data['gender'];
		}
		?>
		<script type="text/javascript" charset="utf-8" async defer>
			window.location.href = "http://localhost/WebNC/";
		</script>
		<?php 
	}
}
?>
<script>
	$(document).ready(function(){
		$('.aj').hide();
		$("input[name='login']").on("click",function(){
			$("input[type='text'],input[type='password']").each(function() {
				if($(this).val().trim() == "") {
					$("input[name='login']").prop('disabled',true);
					$(this).css({"box-shadow":"inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgb(251, 67, 94)"});
					$('.aj').text("Please enter your email and password");
					$('.aj').show();
				}
			});
		});
		$('form input').blur(function()
		{
			if(!$(this).val()) 
			{
				$("input[name='login']").prop('disabled',false);
				$(this).css({"box-shadow":"inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgb(251, 67, 94)"});
			}
			else
			{
				$(this).css({"box-shadow":"rgba(0, 0, 0, 0.075) 0px 1px 1px inset, rgba(103, 239, 126, 0.91) 0px 0px 8px"});
			}
		});

		$("input[type='text'],input[type='password']").click(function(){
			$("input[name='login']").prop('disabled',false);
			$(this).css({"box-shadow":"inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6)"});
		});
	});
</script>
<div class="head-bread">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="index.html">HOME</a></li>
			<li class="active">LOGIN</li>
		</ol>
	</div>
</div>
<!--signup-->
<!-- login-page -->
<div class="login">
	<div class="container">
		<div class="login-grids">
			<div class="col-md-6 log">
				<h3>Login</h3>
				<p>
					<div class="alert alert-danger aj">
					</div>
				</p>
				<?php if (isset($_SESSION['loi']) && !empty($_SESSION['loi'])): ?>
				<p>
					<div class="alert alert-danger">
						<?php echo $_SESSION['loi']; $_SESSION['loi'] = ""; ?>
					</div>
				</p>
			<?php endif ?>
			<p>Welcome, please enter the following to continue.</p>
			<p>If you have previously Login with us, <a href="#">Click Here</a></p>
			<form action="" method="POST">
				<h5>User Name:</h5>	
				<input type="text" name="email" placeholder="Email">
				<h5>Password:</h5>
				<input type="password"  name="pass" placeholder="Password"><br>					
				<input type="submit" name="login"  value="Login">
			</form>
			<a href="<?php echo filter_var($google_client->createAuthUrl(), FILTER_SANITIZE_URL) ?>" class="btn google">Login with Google</a><br>
			<a href="#">Forgot Password ?</a>
		</div>
		<div class="col-md-6 login-right">
			<h3>New Registration</h3>
			<div class="strip"></div>
			<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
			<a href="Login/Sign_in" class="button">Create An Account</a>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
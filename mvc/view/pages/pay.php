<?php if (!isset($_SESSION['user'])): ?>
	<script type="text/javascript" charset="utf-8" async defer>
		window.location.href = "http://localhost/WebNC/Login/";
	</script>
<?php endif ?>
<script>
	$(document).ready(function(){
		$('.alert').hide();
		$("button[name='pay']").on("click",function(){
			$("input[type='text'],input[type='date']").each(function() {
				if($(this).val().trim() == "") {
					$("button[name='pay']").prop('disabled',true);
					$(this).css({"box-shadow":"inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgb(251, 67, 94)"});
					$('.alert').text("Please enter your information");
					$('.alert').show();
				}
			})
		});
		$('form input').blur(function()
		{
			if(!$(this).val()) 
			{
				$("button[name='pay']").prop('disabled',false);
				$(this).css({"box-shadow":"inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgb(251, 67, 94)"});
			}
			else
			{
				$(this).css({"box-shadow":"rgba(0, 0, 0, 0.075) 0px 1px 1px inset, rgba(103, 239, 126, 0.91) 0px 0px 8px"});
			}
		});

		$('input.form-control').click(function(){
			$("button[name='pay']").prop('disabled',false);
			$(this).css({"box-shadow":"inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6)"});
		});
		
		$("input[name='email']").change(function(){
			var email = $(this).val();
			if(validateEmail(email) == false)
			{
				$("button[name='pay']").prop('disabled',false);
				$(this).css({"box-shadow":"inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgb(251, 67, 94)"});
				$('.alert').text("Email don't exists");
				$('.alert').show();
			}
			$.post("./mvc/core/xuly_ajax.php",
			{
				email_pay : email,
			},
			function(data,status){
				if (status == 'success') {
					$("button[name='pay']").val(Number(data));
				}
			});
		});
		$("input[name='gender']").blur(function(){
			var gender = capitalizeFirstLetter($(this).val());
			if (gender.trim() == "Male" || gender.trim() == "Female") {
			}
			else
			{
				$("button[name='pay']").prop('disabled',false);
				$(this).css({"box-shadow":"inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgb(251, 67, 94)"});
			}
		});
	});
</script>
<div class="head-bread">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="Home/Show">Home</a></li>
			<li class="active">Pay</li>
		</ol>
	</div>
</div>
<!-- reg-form -->

<div class="reg-form">
	<div class="container">
		<div class="reg">
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-5">
						<div class="price-details">
							<h3>INFORMAITION</h3>
						</div>
						<div class="alert alert-danger m-3"></div>
						<ul>
							<li class="text-info">Full Name: </li>
							<li><input class="form-control" type="text" name="name" value="<?php echo $_SESSION['user'] ?>"></li>
						</ul>
						<ul>
							<li class="text-info">Birth: </li>
							<li><input class="form-control" type="date" name="birth"></li>
						</ul>				 
						<ul>
							<li class="text-info">Gender: </li>
							<li><input class="form-control" type="text" name="gender" placeholder="Male or Famale" style="text-transform: capitalize;"></li>
						</ul>
						<ul>
							<li class="text-info">Email: </li>
							<li><input class="form-control" type="text" name="email"></li>
						</ul>
						<ul>
							<li class="text-info">Phone: </li>
							<li><input class="form-control" type="text" name="phone"></li>
						</ul>
						<ul>
							<li class="text-info">Address: </li>
							<li><input class="form-control" type="text" name="add"></li>
						</ul>						
					</div>
					<div class="col-md-2">

					</div>
					<div class="col-md-5 cart-total">
						<div class="price-details">
							<h3 style="margin-bottom: 1.4em">PRICE DETAILS</h3>
							<span>NAME PRODUCT</span>
							<span style="text-align: right;">QTY</span>
							<div class="clearfix"></div>
							<hr class="featurette-divider">
							<?php if (isset($_SESSION['cart'])): ?>
								<?php foreach($_SESSION['cart'] as $key=>$value)
								{
									$item[]=$key;
								}
								$str=implode(",",$item); 
								$sql="SELECT * FROM `sanpham` where masp in ($str) order by gia ASC";
								$query = $con->query($sql) or die($con->error);
								while($row = mysqli_fetch_array($query))
									{ ?>
										<div class="row" style="margin: 0;">
											<span ><?php echo $row['tensp']?></span>
											<span style="text-align: right;"><?php echo $_SESSION['cart'][$row['masp']]."x".number_format($row['gia']*(1-(float)$row['khuyenmai']/100)*$_SESSION['cart'][$row['masp']],3); ?></span>
										</div>
									<?php } ?>
									<div class="clearfix"></div>
									<hr class="featurette-divider">
								<?php endif ?>  
								<span>Total</span>
								<span class="total1">
									<?php if (isset($_SESSION['cart'])): ?>
										<?php echo number_format($_SESSION['gia'],3) ?> 
										<?php else: ?>
											0
										<?php endif ?>  
									VND</span><br>
									<span>Discount</span>
									<span class="total1">10%(Festival Offer)</span>
									<span>Delivery Charges</span>
									<span class="total1">Free</span>
									<div class="clearfix"></div>				 
								</div>
								<hr class="featurette-divider">
								<ul class="total_price">
									<li class="last_price"> <h4>TOTAL</h4></li>	
									<li class="last_price" style="text-align: right;"><span >
										<?php if (isset($_SESSION['cart'])): ?>
											<?php echo number_format($_SESSION['gia'],3) ?> 
											<?php else: ?>
												0
											<?php endif ?>  
										VND</span></li>
										<div class="clearfix"> </div>
									</ul> 
									<button type="submit" name="pay" >Pay Now</button>
									<div class="clearfix"></div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
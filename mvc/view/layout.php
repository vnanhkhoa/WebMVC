<!DOCTYPE html>
<html>
<head>
	<title>N-Air a E-commerce category Flat Bootstrap Responsive Website Template | Products :: w3layouts</title>
	<base href="http://localhost/WebNC/" target="_self">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="N-Air Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<meta charset utf="8">
	<!--fonts-->
	<link href='//fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>

	<!--fonts-->
	<!--form-css-->
	<link href="public/css/form.css" rel="stylesheet" type="text/css" media="all" />
	<!--bootstrap-->
	<link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--coustom css-->
	<link href="public/css/css.css" rel="stylesheet" type="text/css"/>
	<!--shop-kart-js-->
	<script src="public/js/simpleCart.js"></script>
	<!--default-js-->
	<script src="public/js/jquery-2.1.4.min.js"></script>
	<!--bootstrap-js-->
	<script src="public/js/bootstrap.min.js"></script>
	<!--script-->
	<!-- FlexSlider -->
	<script src="public/js/imagezoom.js"></script>
	<script defer src="public/js/jquery.flexslider.js"></script>
	<link rel="stylesheet" href="public/css/flexslider.css" type="text/css" media="screen" />

	<script>
		$(window).load(function() {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
</head>
<body>
	<header>
		<?php require_once './mvc/view/pages/menu.php'; ?>
	</header>

	<main>
		<?php require_once './mvc/view/pages/'.$data['Page'].'.php'; ?>
	</main>

	<footer>
		<?php require_once './mvc/view/pages/footer.php'; ?>
	</footer>
</body>
</html>
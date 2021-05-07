<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<base href="http://localhost/WebNC/" target="_self">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="mvc/view/Admin/public/js/scripts.js"></script>
	<script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="mvc/view/Admin/public/css/css.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
	<header>
		<?php require_once './mvc/view/Admin/Page/menu.php'; ?>
	</header>
	<main>
		<div class="new-wrapper">
			<div id="main">
				<div id="main-contents">
					<?php require_once './mvc/view/Admin/Page/'.$data['Page'].'.php'; ?>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
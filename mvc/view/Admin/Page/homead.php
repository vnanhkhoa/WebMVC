
<h1 class="display-4 d-none d-sm-block">
	Bootstrap 4 Dashboard
</h1>
<p class="lead d-none d-sm-block">Plus off-canvas sidebar, based on Bootstrap v4</p>

<div class="alert alert-warning fade collapse" role="alert" id="myAlert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
		<span class="sr-only">Close</span>
	</button>
	<strong>Holy guacamole!</strong> It's free.. this is an example theme.
</div>
<div class="row mb-3">
	<div class="col-xl-3 col-sm-6 py-2">
		<div class="card bg-success text-white h-100">
			<div class="card-body bg-success">
				<div class="rotate">
					<i class="fa fa-user fa-4x"></i>
				</div>
				<h6 class="text-uppercase">Users</h6>
				<h1 class="display-4"><?php echo $data['User'] ?></h1>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 py-2">
		<div class="card text-white bg-danger h-100">
			<div class="card-body bg-danger">
				<div class="rotate">
					<i class="fa fa-list fa-4x"></i>
				</div>
				<h6 class="text-uppercase">Posts</h6>
				<h1 class="display-4">87</h1>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 py-2">
		<div class="card text-white bg-info h-100">
			<div class="card-body bg-info">
				<div class="rotate">
					<i class="fab fa-twitter fa-4x"></i>
				</div>
				<h6 class="text-uppercase">Tweets</h6>
				<h1 class="display-4">125</h1>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 py-2">
		<div class="card text-white bg-warning h-100">
			<div class="card-body">
				<div class="rotate">
					<i class="fa fa-share fa-4x"></i>
				</div>
				<h6 class="text-uppercase">Shares</h6>
				<h1 class="display-4">36</h1>
			</div>
		</div>
	</div>
</div>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Sistema de Reserva de Hotel</title>
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/0f9963a2b8.js" crossorigin="anonymous"></script>
	<!-- CSS Login -->
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
	<!-- CSS Bootstrap -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
	<div class="row align-items-center justify-content-center">
		<div class="col-sm-s4">
			<div class="card">
				<article class="card-body">
					<h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
					<hr>
					<p class="text-success text-center">Some message goes here</p>
					<form>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<input name="email" class="form-control" placeholder="Email or login" type="email" required="required">
							</div> <!-- input-group.// -->
						</div> <!-- form-group// -->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
								</div>
							    <input name="password" class="form-control" placeholder="******" type="password" required="required">
							</div> <!-- input-group.// -->
						</div> <!-- form-group// -->
						<div class="form-group">
							<button type="submit" class="btn btn-orange btn-block"> Login  </button>
						</div> <!-- form-group// -->
						<p class="text-center"><a href="#" class="btn">Forgot password?</a></p>
					</form>
				</article>
			</div> <!-- card.// -->
		</div><!-- col.// -->
	</div><!-- row.// -->
</div>
	<!-- JS do Bootstrap -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
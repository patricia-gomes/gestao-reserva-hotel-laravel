<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/0f9963a2b8.js" crossorigin="anonymous"></script>
	<!--- CSS Navbar	-->
	<link rel="stylesheet" href="{{ asset('css/menu_left.css') }}" >
	<!--- CSS Content	-->
	<link rel="stylesheet" href="{{ asset('css/content.css') }}" >
	<!--- CSS Footer	-->
	<link rel="stylesheet" href="{{ asset('css/footer.css') }}" >
	<!--- CSS Bootstrap -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<script>
		function open_div() {
			var itens = document.getElementById('itens');
			
			if(itens.style.display == "none") {
				itens.style.display = "block";				
			} else {
				itens.style.display = "none";
			}
		}
	</script>
</head>
<body>
<!------- Navbar ------->
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Hotel</a>

	  <div class="collapse navbar-collapse">
	    <ul class="navbar-nav mr-auto"></ul>
		
	    <div class="my-2 my-lg-0">
			<a class="navbar-brand" href="#"> <i class="fa fa-user" title="Usuário"></i> </a>
	    </div>
	  </div>
	</nav><!------- Navbar./ ------->
</header>
<!------- Content ------->
<div class="container-fluid">
	<div class="row">
		<!--- Menu Left --->
		<div class="col-2 menu_left" >
			<ul>
				<a href="#"><li>Home</li></a>
				<a href="#"><li>Reservas</li></a>
				<a href="#"" onclick="open_div()"><li>Cadastrar <img src="{{ asset('images/arrow-down.png') }}" ></li></a>
				<div id="itens" >
					<ul>
						<a href="#"><li>Cadastrar Hóspedes</li></a>
						<a href="#"><li>Cadastrar Acomodações</li></a>
						<a href="#"><li>Cadastrar Reservas</li></a>
					</ul>
				</div>
				<a href="#"><li>Hóspedes</li></a>
				<a href="#"><li>Calendário</li></a>
				<a href="#"><li>Configurações</li></a>
			</ul> 
		</div><!--- Menu Left ./ --->
		<!---- Cards ---->
		<div class="col-10">
			<div class="row padding" >
				<div class="col-10">
					<a href="#" class="badge badge-warning">Entradas hoje</a>
					<a href="#" class="badge badge-info">Saídas hoje</a>
				</div>
			</div><!-- row./ -->
			<div class="row padding">

				@yield('content')

			</div><!-- row./ -->
		</div><!-- col./ -->
	</div><!-- row./ -->
	
	<!-- footer -->
	<footer>
		<div class="row" style="background:black" >
			<div class="col-12 footer">
				<p>Patricia Gomes | 2021</p>
			</div>
		</div>
	</footer>
</div><!------- Content./ ------->


	<!-- JS do Bootstrap -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
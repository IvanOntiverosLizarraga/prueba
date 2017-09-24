<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href=" {{ asset('recursos/bootstrap/css/bootstrap.css') }} ">
	<link rel="stylesheet" href=" {{ asset('recursos/estilos/estilos.css') }} ">
</head>
<body>
	
	@include('template.partials.nav')

	<section>
		<div class="contenedor">
			<div class="titulo">			
			@yield('title')
		</div>		
		<div class="contenido">			
			@yield('content')
		</div>
		</div>
		
	</section>
	
	<script src="{{ asset('recursos/jquery/js/jquery-3.2.1.js') }}"></script>
	<script src="{{ asset('recursos/popper/js/popper.js') }}"></script>
	<script src="{{ asset('recursos/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>
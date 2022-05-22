<!DOCTYPE html>
<html>
<head>
	<title>@yield('title') | Alphabet Store</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<style type="text/css">
		nav{
			background-color: salmon;
			height: 50px;
		}
		.nav-link{
			color: white;
			line-height: 35px;

		}
		a:hover{
			background-color: lightblue;

		}
		.nav-link:active{
			padding-top: 10px;
		}
	</style>
</head>
<body>
	<nav class="nav">
		<a class="nav-link active" aria-current="page" href="#"><img src="{{asset('pict/logo.png')}}" alt="" width="30" height="30" class="d-inline-block align-text-top">&nbsp;Alphabet Store</a>
		<ul class="nav justify-content-end">
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="{{route('customer.login')}}">Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('customer.daftar')}}">Signup</a>
			</li>
		</ul>
	</nav>

	@yield('konten')
</body>
</html>
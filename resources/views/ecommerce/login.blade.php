@extends('layouts.landing')
@section('title','Login ')
@section('konten')

<style type="text/css">
	.container{
		padding-top: 20px;
	}
	.foto img {
		padding-top: 20px;
		height: 500px;
		size: cover;
	}
	.row{
		height: 500px;
		width: 100%;
	}

	.log{
		padding-top: 50px;
		padding-bottom: 30px;
	}

	a{
		text-decoration: none;

	}

	.btn{
		background-color: cyan;
	}
	.btn:hover{
		background-color: #eaeaea;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="foto">
				<img src="{{asset('pict/28.jpg')}}">
			</div>
		</div>

		<div class="col-lg-6">
			<div class="card mt-5">
				<div class="card-body">
					<h3 class="text-center">Login</h3>
					<p class="text-center">(Login youurself to get access)</p>
					<br>
					<!-- form validasi -->
					<form method="POST" action="{{route('customer.aksi_login')}}">
						@csrf
						@if(session('message'))
						<div class="alert alert-danger" role="alert">
							{{ session('message') }}
						</div>
						@endif

						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" type="text" name="email"></input>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control" type="password" name="password"></input>
						</div>
						<div class="form-group mt-5">
							<input class="btn" type="submit" value="Login"></input>
						</div>
						<p>Belum memiliki akun? <a href="{{route('customer.daftar')}}">Daftar disini!</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

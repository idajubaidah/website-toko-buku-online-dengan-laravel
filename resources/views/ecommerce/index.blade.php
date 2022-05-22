@extends('layouts.customer')
@section('title','Selamat Datang | ')
@section('konten')
<link rel="stylesheet" type="text/css" href="asset/css/style.css">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-indicators">
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
	</div>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="{{asset('pict/carosel.png')}}" class="img-fluid d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="{{asset('pict/carosel1.png')}}" class="img-fluid d-block w-100" alt="...">
		</div>
		<!-- <div class="carousel-item">
			<img src="{{asset('pict/3.jpg')}}" class="img-fluid d-block w-100" alt="...">
		</div> -->
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>
<div class="container">
	<h2 class="text-center mt-3">Produk Terbaru</h2>
	<hr>
	<div class="baris"></div>
	<div class="row">
		@foreach($bukus as $no => $produk)
		<div class="col-md-3">
			<div class="card" style="width: 16rem;">
				<img src="/image/{{$produk->foto}}" width="100" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">{{$produk->judul}}</h5>
					<p class="card-text">Rp {{number_format($produk->harga)}}</p>
					<a href="{{route('customer.detail_product', $produk->id)}}" class="btn btn-primary">Beli</a>
				</div>
			</div>
			
		</div>
		@endforeach
	</div>
</div>
@endsection









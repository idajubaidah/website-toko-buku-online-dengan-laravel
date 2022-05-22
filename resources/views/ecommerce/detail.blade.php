@extends('layouts.customer')
@section('title','Detail Produk ')
@section('konten')

<div class="container">
<div class="row">
	<div class="col-md-6">
		<div class="card text-center" style="width: 16rem;">
			<img src="/image/{{$product->foto}}" class = "card-img-center">
		</div>
	</div>
	<div class="col-md-6">
		<h2>Informasi Produk</h2>
		<hr>
		<h4>Judul : {{$product->judul}}</h4>
		<h4>Harga : Rp {{number_format($product->harga)}}</h4>
		<a href="#">Kategori {{$kategoris->kategori}}</a>
		<p class="mt-3">Stok  : {{$product->stok}}</p>
		<p>Penulis : {{$product->penulis}}</p>
		<p>penerbit : {{$product->penerbit}}</p>
		<p>Deskripsi Produk</p>
		<p>{{$product->deskripsi}}</p>
		<form action="{{route('customer.addCart')}}" method="POST">
			@csrf
			<div class="product_count">
				<label for="jumlah">Quantity:</label>
				<input type="text" name="jumlah" id="sst" maxlength="12" value="1" title="Jumlah:" class="input-text jumlah">

				<!-- BUAT INPUTAN HIDDEN YANG BERISI ID PRODUK -->
				<input type="hidden" name="id_buku" value="{{ $product->id }}" class="form-control">

				<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
				class="increase items-count" type="button">
				<i class="fas fa-plus"></i>
			</button>
			<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
				class="reduced items-count" type="button">
				<i class="fas fa-minus"></i>
			</button>
		</div>
		<div class="card_area">

			<button class="btn btn-primary mt-3">Add to Cart</button>


		</div>
	</form>
</div>
</div>
</div>



@endsection
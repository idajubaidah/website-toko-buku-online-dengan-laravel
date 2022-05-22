@extends('layouts.landing')
@section('title','Selamat Datang ')
@section('konten')


<style type="text/css">
	.text-center img{
		height: 400px;
		width: 500px;
	}
	.col{
		padding-top: 100px;
	}
	p{
		text-align: justify;
	}

	.btn{
		padding-top: 10px;
	}

	.btn:hover{
		background-color: blue;
		color:white;
	}
	.btn:active{
		padding-top: 15px;
		padding-left: 15px;
	}

</style>

<div class="container">
	<div class="row">
		<div class="col">
			<div class="text-center">
				<img src="{{asset('pict/6263.jpg')}}" class="img-fluid" alt="...">
			</div>
		</div>
		<div class="col">
			<div class="text-center">
				<h1>ALPHABET STORE</h1>
				<hr>
				<p>Alphabet Store adalah salah toko buku online terlengkap dan terpercaya yang ada di Bekasi. Kami menyediakan berbagai macam koleksi buku berkualitas dan original. Berbagai macam genre bisa anda dapatkan di Alphabet Store. Kami mampu bersaing dengan toko buku yang ada karena harga disini relatif lebih murah, tanpa mengurangi kualitas dann pelayanan yang kami berikan. Kepuasa pelanggan adalah prioritas kami.</p>

				<figure>
					<blockquote class="blockquote">
						<p>“Reality doesn’t always give us the life that we desire, but we can always find what we desire between the pages of books.”</p>
					</blockquote>
					<figcaption class="blockquote-footer">
						Adelise M. Cullens <cite title="Source Title">Dead Bunnies Make All Eight Of Me Cry</cite>
					</figcaption>
				</figure>
				<a href="{{route('customer.login')}}" role="button" class="btn btn-primary">Shop Now</a>
			</div>
		</div>
	</div>
</div>

@endsection
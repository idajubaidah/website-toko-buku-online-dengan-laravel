@extends('layouts.admin')

@section('title','Tambah Produk')

@section('content')
<main class="main">
	<div class="container-fluid">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col">
					<!-- form validasi -->
					<form action="{{route('product.store')}}" enctype="multipart/form-data" method="post" >
						@csrf
						<div class="form-group">
							<label for="kategori">Kategori</label>
							<select class="form-control" name="id_kategori" id="position-option">
								<option value="">Pilih Kategori</option>
								@foreach ($kategori as $kt)
								<option value="{{ $kt->id }}">{{ $kt->kategori }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="judul">Judul</label>
							<input class="form-control" type="text" name="judul"></input>
						</div>
						<div class="form-group">
							<label for="harga">Harga (Rp)</label>
							<input class="form-control" type="number" name="harga"></input>
						</div>
						<div class="form-group">
							<label for="penulis">Penulis</label>
							<input class="form-control" type="text" name="penulis"></input>
						</div>
						<div class="form-group">
							<label for="penerbit">Penerbit</label>
							<input class="form-control" type="text" name="penerbit"></input>
						</div>
						<div class="form-group">
							<label for="stok">Stok</label>
							<input class="form-control" type="number" name="stok"></input>
						</div>
						<div class="form-group">
							<label for="deskripsi">Deskripsi</label>
							<textarea class="form-control" type="text" name="deskripsi"></textarea> 
						</div>
						<div class="form-group">
							<label for="foto">Foto</label>
							<input class="form-control" type="file" name="foto"></input>
						</div>
						<div class="form-group mt-5">
							<input class="btn btn-primary" type="submit" value="Tambah"></input>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection
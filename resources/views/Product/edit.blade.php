@extends('layouts.admin')

@section('title','Edit Produk')

@section('content')
<main class="main">
	<div class="container-fluid">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col">
					<!-- form validasi -->
					<form action="{{route('admin.update', $product['id'])}}" method="post" >
						@csrf
						@method('PUT')
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
							<input class="form-control" type="text" name="judul" value="{{ $product->judul }}" required></input>
						</div>
						<div class="form-group">
							<label for="harga">Harga (Rp)</label>
							<input class="form-control" type="number" name="harga" value="{{ $product->harga }}" required></input>
						</div>
						<div class="form-group">
							<label for="penulis">Penulis</label>
							<input class="form-control" type="text" name="penulis" value="{{ $product->penulis }}" required></input>
						</div>
						<div class="form-group">
							<label for="penerbit">Penerbit</label>
							<input class="form-control" type="text" name="penerbit" value="{{ $product->penerbit }}" required></input>
						</div>
						<div class="form-group">
							<label for="stok">Stok</label>
							<input class="form-control" type="number" name="stok" value="{{ $product->stok }}" required></input>
						</div>
						<div class="form-group">
							<label for="deskripsi">Deskripsi</label>
							<textarea class="form-control" type="text" name="deskripsi" value="{{ $product->deskripsi }}" required></textarea> 
						</div>
						<div class="form-group">
							<label for="foto">Foto</label>
							<img src="/image/{{$product->foto}}" width="100px" height="100px" alt="">
                            <hr>
                            <input type="file" name="foto" class="form-control">
                            <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                            <p class="text-danger">{{ $errors->first('image') }}</p>
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
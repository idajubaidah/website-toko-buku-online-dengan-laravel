@extends('layouts.admin')

@section('title','Daftar Product')

@section('content')
<main class="main">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active">Product</li>
	</ol>
	<div class="container-fluid">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">
								List Product

								<!-- BUAT TOMBOL UNTUK MENGARAHKAN KE HALAMAN ADD PRODUK -->
								<a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-right">Tambah</a>
							</h4>
						</div>
						<div class="card-body">
							<!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->
							@if (session('success'))
							<div class="alert alert-success">{{ session('success') }}</div>
							@endif

							@if (session('error'))
							<div class="alert alert-danger">{{ session('error') }}</div>
							@endif
							<!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->
							
							<!-- TABLE UNTUK MENAMPILKAN DATA PRODUK -->
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead class="table-dark">
										<tr>
											<th>Gambar</th>
											<th>Produk</th>
											<th>Harga</th>
											<th>Stok</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<!-- LOOPING DATA TERSEBUT MENGGUNAKAN FORELSE -->
										<!-- ADAPUN PENJELASAN ADA PADA ARTIKEL SEBELUMNYA -->
										@forelse ($product as $row)
										<tr>
											<td class="text-center">
												<!-- TAMPILKAN GAMBAR DARI FOLDER PUBLIC/STORAGE/PRODUCTS -->
												<img src="/image/{{$row->foto}}" width="100px" height="100px" alt="">
											</td>
											<td>
												<strong>{{ $row->judul }}</strong><br>
												<!-- ADAPUN NAMA KATEGORINYA DIAMBIL DARI HASIL RELASI PRODUK DAN KATEGORI -->
												<label>Kategori: <span class="badge badge-info">{{ $row->kategori}}</span></label><br>
												<label>Penulis: <span class="badge badge-info">{{ $row->penulis }}</span></label>
												<label>Penerbit: <span class="badge badge-info">{{ $row->penerbit }}</span></label>
											</td>
											<td class="text-center">Rp {{ number_format($row->harga) }}</td>
											<td class="text-center">{{ $row->stok}}</td>
											<td class="text-center">
												<!-- FORM UNTUK MENGHAPUS DATA PRODUK -->
												<form action="{{route('product.destroy', $row->id)}}" method="post">
													@csrf
													@method('DELETE')
													<!-- <a href="{{route('product.edit', $row->id)}}" class="btn btn-warning btn-sm">Edit</a> -->
													<button class="btn btn-danger btn-sm">Hapus</button>
												</form>
											</td>
										</tr>
										@empty
										<tr>
											<td colspan="5" class="text-center">Tidak ada data</td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
							<!-- MEMBUAT LINK PAGINASI JIKA ADA -->
							{!! $product->links() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection

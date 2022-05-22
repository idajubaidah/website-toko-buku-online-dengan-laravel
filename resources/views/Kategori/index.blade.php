@extends('layouts.admin')
@section('title','Kategori ')
@section('content')

<main class="main">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active">Kategori</li>
	</ol>
	<div class="container-fluid">
		<div class="animated fadeIn">
			<div class="row">

				<!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->
				<div class="col-md-4">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Kategori Baru</h4>
						</div>
						<div class="card-body">

							<form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label for="name">Kategori</label>
									<input type="text" name="kategori" class="form-control" required>
									<p class="text-danger">{{ $errors->first('kategori') }}</p>
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-sm">Tambah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->

				<!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">List Kategori</h4>
						</div>
						<div class="card-body">
							<!-- KETIKA ADA SESSION SUCCESS  -->
							@if (session('success'))
							<!-- MAKA TAMPILKAN ALERT SUCCESS -->
							<div class="alert alert-success">{{ session('success') }}</div>
							@endif

							<!-- KETIKA ADA SESSION ERROR  -->
							@if (session('error'))
							<!-- MAKA TAMPILKAN ALERT DANGER -->
							<div class="alert alert-danger">{{ session('error') }}</div>
							@endif

							<div class="table-responsive">
								<table class="table table-bordered">
									<thead class="table-dark">
										<tr>
											<th>No</th>
											<th>Kategori</th>
											<th>Created At</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody> 
										<!-- LOOPING DATA KATEGORI SESUAI JUMLAH DATA YANG ADA DI VARIABLE $CATEGORY -->
										@forelse ($kategori as $no => $val)
										<tr>
											<td scope="row">{{$kategori->firstItem()+$no}}</td>
											<td><strong>{{ $val->kategori }}</strong></td>

											<!-- FORMAT TANGGAL KETIKA KATEGORI DIINPUT SESUAI FORMAT INDONESIA -->
											<td>{{ $val->created_at->format('d-m-Y') }}</td>
											<td>

												<!-- FORM ACTION UNTUK METHOD DELETE -->
												<form action="{{ route('kategori.destroy', $val->id) }}" method="post">
													@csrf
													@method('DELETE')
													<a href="{{ route('kategori.edit', $val->id) }}" class="btn btn-warning btn-sm">Edit</a>
													<button class="btn btn-danger btn-sm">Hapus</button>
												</form>
											</td>
										</tr>
										<!-- JIKA DATA CATEGORY KOSONG, MAKA AKAN DIRENDER KOLOM DIBAWAH INI  -->
										@empty
										<tr>
											<td colspan="5" class="text-center">Tidak ada data</td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
							<!-- FUNGSI INI AKAN SECARA OTOMATIS MEN-GENERATE TOMBOL PAGINATION  -->
							{!! $kategori->links() !!}
						</div>
					</div>
				</div>
				<!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
			</div>
		</div>
	</div>
</main>
@endsection
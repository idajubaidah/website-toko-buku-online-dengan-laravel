@extends('layouts.admin')

@section('title','Daftar Pelanggan')

@section('content')
<main class="main">
	<div class="container-fluid">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">
								Daftar Pelanggan
							</h4>
						</div>
						<div class="card-body">
							<!-- BUAT FORM UNTUK PENCARIAN, METHODNYA ADALAH GET -->
							<form action="#" method="get">
								<div class="input-group mb-3 col-md-3 float-right">
									<!-- KEMUDIAN NAME-NYA ADALAH Q YANG AKAN MENAMPUNG DATA PENCARIAN -->
									<input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request()->q }}">
									<div class="input-group-append">
										<button class="btn btn-secondary" type="button">Cari</button>
									</div>
								</div>
							</form>

							<!-- TABLE UNTUK MENAMPILKAN DATA PRODUK -->
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead class="table-dark text-center">
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>No.Hp</th>
											<th>Email</th>
											<th>Alamat</th>
										</tr>
									</thead>
									<tbody>
										<!-- LOOPING DATA TERSEBUT MENGGUNAKAN FORELSE -->
										<!-- ADAPUN PENJELASAN ADA PADA ARTIKEL SEBELUMNYA -->
										<?php $nomor=1;?>
										@forelse ($pelanggan as $row)
										
										<tr>
											<td class="text-center"><?php echo $nomor;?></td>
											<td >{{$row->nama}}</td>
											<td class="text-center">{{$row->no_hp}}</td>
											<td>{{$row->email}}</td>
											<td class="text-center">{{$row->alamat}}</td>
										</tr>
										<?php $nomor++; ?>
										@empty
										<tr>
											<td colspan="5" class="text-center">Tidak ada data</td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
							<!-- MEMBUAT LINK PAGINASI JIKA ADA -->
							{!! $pelanggan->links() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection

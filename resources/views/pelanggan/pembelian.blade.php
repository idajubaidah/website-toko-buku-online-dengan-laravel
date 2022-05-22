@extends('layouts.admin')

@section('title','Penjualan')

@section('content')
<main class="main">
	<div class="container-fluid">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">
								Daftar Penjualan
							</h4>
						</div>
						<div class="card-body">

							<!-- TABLE UNTUK MENAMPILKAN DATA PRODUK -->
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead class="table-dark text-center">
										<tr>
											<th>No</th>
											<th>Tanggal</th>
											<th>Nama</th>
											<th>Produk</th>
											<th>Jumlah</th>
											<th>Total Penjualan</th>
										</tr>
									</thead>
									<tbody>
										<?php $nomor=1;?>
										@forelse ($pembelian as $row)
										
										<tr>
											<td class="text-center"><?php echo $nomor;?></td>
											<td>{{$row->created_at}}</td>
											<td class="text-center">{{$row->name}}</td>
											<td>{{$product->judul}}</td>
											<td class="text-center">{{$row->jumlah}}</td>
											<td>{{$row->total_pembelian}}</td>
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
							{!! $pembelian->links() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection

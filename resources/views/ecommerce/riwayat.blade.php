@extends('layouts.customer')
@section('title','Riwayat Pembelian')
@section('konten')

<section class="riwayat">
	<div class="container mt-5 p-5">
		<h3>Riwayat Pembelian {{$pesanan->name}}</h3>
		<table class="table table-bordered">
			<thead class="text-center">
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php $nomor=1; ?>
					<tr>
						<td><?php echo $nomor;?></td>
						<td>{{$pesanan->created_at}}</td>
						<td>{{$product->judul}}</td>
						<td>Rp {{number_format($product->harga)}}</td>
						<td>{{$pesanan->jumlah}}</td>
						<td>Rp {{number_format($pesanan->total_pembelian)}}</td>
						
					</tr>
					<?php $nomor++; ?>
			</tbody>
		</table>
	</div>
</section>

@endsection
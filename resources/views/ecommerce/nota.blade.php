@extends('layouts.customer')

@section('title','Checkout|')

@section('konten')
<!--================Order Details Area =================-->
<section class="konten">
	<div class="container mt-2">
		<h2 class="text-center">Detail Pembelian</h2>
		<hr>
		<div class="row">
			<div class="col-md-4">
				<h3>Pembelian</h3>
				<strong>No. Pembelian : {{$order->id}}</strong><br>
				Tanggal : {{$order->created_at}}<br>
				Total : {{number_format($order->total_pembelian)}}
			</div>
			<div class="col-md-4">
				<h3>Pelanggan</h3>
				<strong>{{$order->name}}</strong><br>
				<p>
					{{$order->no_hp}} <br>
					{{$order->email}} <br>
				</p>
			</div>
			<div class="col-md-4">
				<h3>Pengiriman</h3>
				<strong>Kota : {{$order->nama_kota}}</strong><br>
				Ongkos Kirim : Rp {{number_format($order->tarif)}}<br>
				Alamat Lengkap : {{$order->alamat}}
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>NO</th>
					<th>Judul Buku</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
					<tr>
						<td><?php echo $nomor;?></td>
						<td>{{$product->judul}}</td>
						<td>Rp {{number_format($product->harga)}}</td>
						<td>{{$product->jumlah}}</td>
						<td>Rp {{$product->subharga}}</td>
					</tr>
					<?php $nomor++; ?>
			</tbody>
		</table>

		<div class="row">
			<div class="col-md-7">
				<div class="alert alert-info">
					<p>Silahkan Melakukan Pembayaran Sebesar Rp {{number_format($order->total_pembelian)}} melalui <br>
						<strong>Bank BCA 7518519900 a/n Ida Jubaidah</strong>
					</p>
				</div>
			</div>
		</div>

		<div>
			<a href="{{route('customer.pembayaran')}}" class="btn btn-primary">Bayar disini</a>
		</div>

	</div>
</section>


@endsection
@extends('layouts.customer')
@section('title','Pembayaran ')
@section('konten')

<div class="container mt-5">
	<h2>Konfirmasi Pembayaran</h2>
	<p>Kirim bukti pembayaran Anda disini</p>
	<div class="alert alert-info">Total tagihan Anda sebesar <strong>Rp {{number_format($pembelian->total_pembelian)}}</strong></div>

	<form method="POST" action="{{route('customer.bayar')}}">
		@csrf
		<div class="form-group">
			<label>Nama</label>
			<input type="text" name="nama" class="form-control">
		</div>
		<div class="form-group">
			<label>Bank</label>
			<input type="text" name="bank" class="form-control">
		</div>
		<div class="form-group">
			<label>Jumlah</label>
			<input type="number" name="jumlah" class="form-control" min="1">
		</div>
		<div class="form-group">
			<label>Bukti Transfer</label>
			<input type="file" name="bukti" class="form-control">
			<p class="text-danger">Foto bukti transfer harus JPG maksimal 2MB</p>
		</div>
		<button class="btn btn-primary" name="kirim">Kirim</button>
	</form>
</div>

@endsection
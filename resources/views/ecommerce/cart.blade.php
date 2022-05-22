@extends('layouts.customer')

@section('title','Keranjang Belanja |')

@section('konten')

<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">
		<div class="cart_inner">
			<form action="{{ route('customer.updateCart') }}" method="post">
				@csrf
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							<!-- LOOPING DATA DARI VARIABLE CARTS -->
							@forelse ($carts as $row)
							<tr>
								<td>
									<div class="media">
										<div class="d-flex">
											
											<img src="{{ asset('image/'. $row['foto'])}}" width="100px" height="100px" alt="{{ $row['judul'] }}">
										</div>
										<div class="media-body">
											<p>{{ $row['judul'] }}</p>
										</div>
									</div>
								</td>
								<td>
									<h5>Rp {{ number_format($row['harga']) }}</h5>
								</td>
								<td>
									<div class="product_count">


										<!-- PERHATIKAN BAGIAN INI, NAMENYA KITA GUNAKAN ARRAY AGAR BISA MENYIMPAN LEBIH DARI 1 DATA -->
										<input type="text" name="jumlah[]" id="sst{{ $row['id_buku'] }}" maxlength="12" value="{{ $row['jumlah'] }}" title="Quantity:" class="input-text qty">
										<input type="hidden" name="id_buku[]" value="{{ $row['id_buku'] }}" class="form-control">
										<!-- PERHATIKAN BAGIAN INI, NAMENYA KITA GUNAKAN ARRAY AGAR BISA MENYIMPAN LEBIH DARI 1 DATA -->


										<button onclick="var result = document.getElementById('sst{{ $row['id_buku'] }}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
										class="increase items-count" type="button">
										<i class="fas fa-plus"></i>
									</button>
									<button onclick="var result = document.getElementById('sst{{ $row['id_buku'] }}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
										class="reduced items-count" type="button">
										<i class="fas fa-minus"></i>
									</button>
								</div>
							</td>
							<td>
								<h5>Rp {{ number_format($row['harga'] * $row['jumlah']) }}</h5>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="4">Tidak ada belanjaan</td>
						</tr>
						@endforelse
						<tr class="bottom_button">
							<td>
								<button class="btn btn-success">Update Cart</button>
							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</form>
					<tr>
						<td>

						</td>
						<td>

						</td>
						<td>
							<h5>Subtotal</h5>
						</td>
						<td>
							<h5>Rp {{ number_format($subtotal) }}</h5>
						</td>
					</tr>
					<tr class="out_button_area">
						<td></td>
						<td></td>
						<td></td>
						<td>
							<div class="checkout_btn_inner">
								<a class="btn btn-success" href="{{ route('customer.index') }}">Continue Shopping</a>
								<a class="btn btn-primary" href="{{ route('customer.checkout') }}">Proceed to checkout</a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</section>
<!--================End Cart Area =================-->
@endsection
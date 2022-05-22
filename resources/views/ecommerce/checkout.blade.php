@extends('layouts.customer')

@section('title','Checkout |')

@section('konten')
<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
  <div class="container">
   <div class="billing_details">
    <div class="row">
     <div class="col-lg-8">
        <h3>Informasi Pengiriman</h3>          
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form class="row contact_form" action="{{route('customer.prosesCheckout')}}" method="post" novalidate="novalidate">
            @csrf
            <div class="col-md-12 form-group p_star">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form-control" id="first" name="nama" readonly="" value="{{$customer->name}}" required>
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">No Handphone</label>
                <input type="text" class="form-control" id="number" name="no_hp" readonly="" value="{{$customer->no_hp}}" required>
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Email</label>
                <input type="email" class="form-control" id="email" name="email" readonly="" value="{{$customer->email}}" required>
            </div>
            <div class="col-md-12 form-group p_star">
                <label for="">Alamat Lengkap</label>
                <textarea type="text" class="form-control" id="add1" name="alamat"  required></textarea>
            </div>
            <div class="col-md-12 form-group p_star">
                <label for="">Ongkos Kirim</label>
                <select class="form-control" name="id_ongkir" id="id" required>
                    <option value="">Pilih Ongkir</option>
                    @foreach ($ongkir as $row)
                    <option value="{{ $row->id }}">{{ $row->kota }} - Rp {{number_format($row->tarif)}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
           <div class="card-header" style="font-size: 32px;">Ringkasan Pesanan</div>

           <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="#">Product
                    <span>Total</span>
                </a>
            </li>
            @foreach ($carts as $cart)
            <li class="list-group-item">
                <a href="#">{{ \Str::limit($cart['judul'], 10) }}
                    <span class="middle">{{ $cart['jumlah'] }}</span>
                    <span class="last"> x Rp {{ number_format($cart['harga']) }}</span>
                </a>
            </li>
            @endforeach
        </ul>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="#">Subtotal
                    <span>Rp {{ number_format($subtotal) }}</span>
                </a>
            </li>
        </ul>
        <button class="btn btn-primary">Bayar Pesanan</button>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>

<!--================End Checkout Area =================-->
@endsection
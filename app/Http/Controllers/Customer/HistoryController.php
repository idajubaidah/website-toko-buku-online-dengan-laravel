<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HistoryController extends Controller
{
    public function show(){
    	$id = Auth::id();
        $customer = DB::table('users')->where('id', $id)->first();

    	$pesanan = DB::table('pembelians')->where('id_customer', $id)
    	->join('users','pembelians.id_customer','=','users.id')
    	->join('pembelian_produks','pembelian_produks.id_pembelian','=','pembelians.id')
    	->first();

    	$product = DB::table('pembelian_produks')
        ->join('bukus','pembelian_produks.id_buku','=','bukus.id')
        ->first();

    	return view('ecommerce.riwayat', compact('pesanan','product'));
    }

}

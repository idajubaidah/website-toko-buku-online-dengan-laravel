<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PembelianController extends Controller
{
    public function index(){
    	$id = Auth::id();
    	$pembelian = DB::table('pembelians')
    	->join('pembelian_produks','pembelian_produks.id_pembelian','=','pembelians.id')
    	->join('users','pembelians.id_customer','=','users.id')
    	->paginate(10);
    	
    	// $pembelian = DB::table('pembelians')
    	// ->join('pembelian_produks','pembelian_produks.id_pembelian','=','pembelians.id')
    	// ->first();
    	$product = DB::table('pembelian_produks')
        ->join('bukus','pembelian_produks.id_buku','=','bukus.id')
        ->first();

    	// $customer = DB::table('users')->where('id', $id)->first();

    	return view('pelanggan.pembelian', compact('pembelian','product'));
    }
}

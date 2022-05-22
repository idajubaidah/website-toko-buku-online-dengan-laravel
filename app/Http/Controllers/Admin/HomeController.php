<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{

	public function index() {
		$customer = DB::table('users')->count();
		$penjualan = DB::table('pembelians')->sum('total_pembelian');
		$product = DB::table('bukus')->count();
        return view('home', compact('customer','penjualan', 'product'));
    }

    
    
}

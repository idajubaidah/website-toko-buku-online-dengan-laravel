<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Buku;
use App\Kategori;
use DB;

class EcommerceController extends Controller
{
    public function index(){

		$bukus = Buku::orderBy('created_at','DESC')->paginate(10);
		
		return view('ecommerce.index',compact('bukus'));
	}

	// menampilkan halaman detail produk
	public function show($id){
		$product = Buku::where('id', $id)->first();
		$kategoris = DB::table('bukus')
            ->leftJoin('kategoris', 'bukus.id_kategori', '=', 'kategoris.id')->first();
		return view ('ecommerce.detail', compact('product','kategoris'));
	}

}

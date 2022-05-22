<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PelangganController extends Controller
{
    public function index(){
    	$pelanggan = DB::table('pelanggans')->paginate(10);
    	return view ('pelanggan.index', compact('pelanggan'));
    }
    
}

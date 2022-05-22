<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
Use App\Pembayaran;
Use App\Pembelian;

class PembayaranController extends Controller
{
    public function index() {

    	$id = Auth::id();
        $customer = DB::table('users')->where('id', $id)->first();
    	$pembelian = DB::table('pembelians')->where('id_customer', $id)->first();
    	return view ('ecommerce.pembayaran', compact('pembelian','customer','id'));
    }

    public function store(Request $request) {

    	$id = Auth::id();
    	$pembelian = DB::table('pembelians')->where('id_customer', $id)->first();

	    // insert data ke db
        if ($files=$request->file('bukti')) {
            $name=$files->getClientOriginalName();
            $files->move('bukti_pembayaran', $name);
            DB::table('pembayarans')->insert([
            	'id_pembelian' => $pembelian->id,
                'bukti'=>$name,
                'nama' =>$request->nama,
                'bank' => $request->bank,
                'jumlah' => $request->jumlah
                
            ]);
        }
			return redirect()->route('customer.index', compact('pembelian'));
	}
}

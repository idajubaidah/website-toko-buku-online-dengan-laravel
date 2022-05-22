<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Buku;
use App\Ongkir;
use App\Customer;
use App\Pembelian;
use App\Pembelian_produk;
use App\Pelanggan;



class CartController extends Controller
{

	public function addToCart(Request $request) {
    	//ambil data dari cookie
		$carts = $this->getCarts();

    	//jika carts tidak null dan id produknya ada di dalam array carts
		if ($carts && array_key_exists($request->id_buku, $carts)) {
    		//update qty berdasarkan id buku yg dijadikan key array
			$carts[$request->id_buku]['jumlah'] += $request->jumlah;
		} else {
    		//query mengambil produk berdasarkan id
			$product = Buku::find($request->id_buku);

    		//tambah data baru dg menjadikan id buku sebagai key array
			$carts[$request->id_buku] = [
				'jumlah' => $request->jumlah,
				'id_buku' => $product->id,
				'judul' => $product->judul,
				'harga' => $product->harga,
				'foto' => $product->foto
			]; 
		}

    	//membuat cookie dengan nama alphabet-carts
    	//encode cookie dengan limit 2800 menit atau 48 jam
		$cookie = cookie('alphabet-carts', json_encode($carts), 2880);
    	//store ke browser untuk disimpan
		return redirect()->back()->cookie($cookie);

	}

	public function listCart(){
    	//ambil data dari cookie
		$carts = $this->getCarts();

    	//mengubah array menjadi collection
    	//menggunakan method sum untuk menghitung subtotal
		$subtotal = collect($carts)->sum(function($q) {
			return $q['jumlah'] * $q['harga'];
		});

		return view('ecommerce.cart', compact('carts','subtotal'));
	}

	public function updateCart(Request $request) {
    //AMBIL DATA DARI COOKIE
        $carts = $this->getCarts();
        foreach($request->id_buku as $key => $row) {
            if ($request->jumlah[$key] == 0) {
                unset($carts[$row]);
            } else {
                $carts[$row]['jumlah'] = $request->jumlah[$key];
            }
        }
        $cookie = cookie('alphabet-carts', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie);
    }

    private function getCarts() {
        $carts = json_decode(request()->cookie('alphabet-carts'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }

    public function checkout(){
      $ongkir = DB::table('ongkirs')->get();
    	$carts = $this->getCarts(); //ambil data yg ada di cart
    	//menghitung subtotal dari keranjang belanja
    	$subtotal = collect($carts)->sum(function($q) {
    		return $q['jumlah'] * $q['harga'];
    	});

    	return view('ecommerce.checkout', compact('ongkir','carts','subtotal'));
    }

    public function prosesCheckout (Request $request) {

    	DB::beginTransaction();
    	try{

    	//ambil data di keranjang
    		$carts = $this->getCarts();

    	//hitung subtotal belanjaan
    		$subtotal = collect($carts)->sum(function($q) {
    			return $q['jumlah'] * $q['harga'];
    		});

    		// $ongkir = Ongkir::where(['id'=>$request->id_ongkir])->first();
    		// $ongkir->attributesToArray();

    		// $ongkir = Ongkir::find($request->id_ongkir);
    		// $tarif = DB::table('ongkirs')->select('tarif')->where('id', $request->id_ongkir)->get();


    		// $total_pembelian = $subtotal + $tarif;

    		$pelanggan = Pelanggan::create([
    			'nama' => $request->nama,
    			'no_hp' => $request->no_hp,
    			'email' => $request->email,
    			'alamat' => $request->alamat
    		]);

    		$ongkir = DB::table('ongkirs')->where('id', $request->id_ongkir)->get();
    		foreach ($ongkir as $row) {
    			$pembelian = Pembelian::create([
                   'id_customer' => $pelanggan->id,
                   'id_ongkir' => $request->id_ongkir,
                   'subharga' => $subtotal,
                   'nama_kota' => $row->kota,
                   'tarif' => $row->tarif,
                   'total_pembelian' => $subtotal+$row->tarif
               ]);
    		}

    		foreach ($carts as $row) {
    			$product = Buku::find($row['id_buku']);

    			$pembelian_produk = Pembelian_produk::create([
    				'id_pembelian' => $pembelian->id,
    				'id_buku' => $row['id_buku'],
    				'jumlah' => $row['jumlah'],
    				'subharga' => $subtotal
    			]);
    		}

    		DB::commit();

    		$carts = []; //mengosongkan datakeranjang

    		$cookie = cookie('alphabet-carts', json_encode($carts), 2880);

    		return redirect(route('customer.nota',
                $pembelian->id))->cookie($cookie);

    	} catch (\Exception $e) {
        //JIKA TERJADI ERROR, MAKA ROLLBACK DATANYA
    		DB::rollback();
        //DAN KEMBALI KE FORM TRANSAKSI SERTA MENAMPILKAN ERROR
    		return redirect()->back()->with(['error' => $e->getMessage()]);

    	}


    }

    public function checkoutFinish($id) {
    	//AMBIL DATA PESANAN BERDASARKAN INVOICE
    	$order = DB::table('pembelians')->where('pembelians.id', $id)
        ->join('pelanggans','pembelians.id_customer','=','pelanggans.id')
        ->join('pembelian_produks','pembelian_produks.id_pembelian','=','pembelians.id')
        ->first();
    	//LOAD VIEW nota.blade.php DAN PASSING DATA ORDER

        $product = DB::table('pembelian_produks')
        ->join('bukus','pembelian_produks.id_buku','=','bukus.id')
        ->first();
        return view('ecommerce.nota', compact('order','product'));
    }

    
    
}
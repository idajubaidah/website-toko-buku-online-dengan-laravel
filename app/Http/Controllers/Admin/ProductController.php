<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Buku;
use App\Kategori;
use File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index() {
        $product = DB::table('bukus')
            ->leftJoin('kategoris', 'bukus.id_kategori', '=', 'kategoris.id')
            ->paginate(12);
    	return view('product.index', compact('product'));
    }

    public function create() {
        $kategori = DB::table('kategoris')->get();
    	return view('product.create', compact('kategori'));
    }

    public function store(Request $request) {
	    // insert data ke db
        if ($files=$request->file('foto')) {
            $name=$files->getClientOriginalName();
            $files->move('image', $name);
            Buku::create([
                'id_kategori' => $request->id_kategori,
                'foto'=>$name,
                'judul' =>$request->judul,
                'penerbit' => $request->penerbit,
                'penulis' => $request->penulis,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'stok' => $request->stok,
                
            ]);
        }
			return redirect()->route('product.index')->with(['success'=>'Produk berhasil ditambahkan']);


	}

    public function edit($id) {
        $product = DB::table('bukus')->where('id', $id)->get(); //AMBIL DATA PRODUK TERKAIT BERDASARKAN ID
        // $id = DB::table('bukus')->select('id')->where('id', $id)->first();
        $kategori = DB::table('kategoris')->get();
        return view('product.edit', compact('product', 'kategori')); //LOAD VIEW DAN PASSING DATANYA KE VIEW
    }

    public function update(Request $request, $id) {
        $product = Buku::find($id);

        $filename = $product->foto;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $files->getClientOriginalName();
            $files->move('image', $filename);
        }

        $product->update([
            'id_kategori' => $request->id_kategori,
            'foto'=>$filename,
            'judul' =>$request->judul,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
        ]);
        return redirect(route('product.index'))->with(['success' => 'Data Produk Diperbaharui']);
    }

    public function destroy($id) {
        // $product = Buku::find($id);
        // //hapus foto
        // File::delete(storage_path('/image/' . $product->foto));
        // // hapus data
        // $product->delete();

        Buku::where('id', $id)->delete();
        return redirect(route('product.index'))->with(['success' => 'Produk Berhasil Dihapus']);
    }


}

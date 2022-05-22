<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function index(){
    	$kategori = Kategori::with(['kategori'])->orderBy('created_at','ASC')->paginate(10);
    	return view('Kategori.index',compact('kategori'));
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'kategori' => 'required|string|max:50|unique:kategoris']);
    	$request->request->add(['kategori' => $request->kategori]);
    	Kategori::create($request->except('_token'));
    	return redirect(route('kategori.index'))->with(['success'=>'Kategori Baru Ditambahkan!']);
    }

    public function edit($id) {
    	$kategori = Kategori::find($id); //ambil data berdasarkan id
    	return view('Kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id) {
    	$this->validate($request,[
    		'kategori' => 'required|string|max:50']);
    	$kategori = Kategori::find($id);
    	$kategori->update([
    		'kategori'=>$request->kategori]);
    	return redirect(route('kategori.index'))->with(['success' => 'Kategori Diperbaharui']);
    }

    public function destroy($id) {
    	$kategori = Kategori::find($id);
    	$kategori->delete();
    	return redirect (route('kategori.index'))->with(['success' => 'Kategori Berhasil Dihapus!']);
    }
}

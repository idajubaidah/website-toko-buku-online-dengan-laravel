<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

	protected $fillable = ['id_kategori','kategori'];

	// public function kategori(){
	// 	return $this->belongsTo(Kategori::class);
	public function kategori(){
		return $this->belongsTo(Kategori::class);
	}

	public function buku()
	{
    //JENIS RELASINYA ADALAH ONE TO MANY, YANG BERARTI KATEGORI INI BISA DIGUNAKAN OLEH BANYAK PRODUK
    return $this->hasMany(Buku::class);
	}
}

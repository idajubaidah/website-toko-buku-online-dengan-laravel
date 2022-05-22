<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
	protected $fillable = [
        'judul', 'id', 'penulis', 'penerbit','foto','stok','harga','deskripsi','id_kategori'
    ];
    public function kategori() {
    	return $this->belongsTo(Kategori::class,'kategori_id');

    }
    protected $guarded = [];

}

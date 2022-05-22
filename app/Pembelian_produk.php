<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian_produk extends Model
{
    protected $fillable = [
        'id_pembelian', 'id_buku', 'jumlah','subharga',
    ];
}

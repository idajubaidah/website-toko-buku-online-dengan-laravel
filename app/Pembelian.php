<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $fillable = [
        'id_customer','id_ongkir','total_pembelian','nama_kota','tarif','status','subharga', 'alamat_pengiriman','created_at'
    ];
}

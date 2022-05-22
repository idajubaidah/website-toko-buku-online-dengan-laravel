<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'nama', 'bank', 'jumlah', 'id_pembelian',
    ];

    public function pembelian() {
        return $this->belongsTo('App\Pembelian','id_pembelian','id');
    }
}

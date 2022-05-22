<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'id', 'kota', 'tarif',
    ];
}

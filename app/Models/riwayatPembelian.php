<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayatPembelian extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function oTransak()
    {
        return $this->hasOne(Transaksi::class, 'id', 'id_transak');
    }
}

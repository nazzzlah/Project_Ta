<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'transaksis';

    public function pesanan() {
        return $this->belongsTo(Pesanan::class, 'id_pemesanan');
    }
}

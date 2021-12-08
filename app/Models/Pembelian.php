<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $primaryKey='id_pembelian';
    protected $guarded=['id_pembelian'];

    public function barang(){
        return $this->hasOne(Barang::class,'id_barang','id_barang');
    }
}

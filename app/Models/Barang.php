<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $primaryKey='id_barang';
    protected $fillable = [
        'name',
        'merk',
        'stock',
        'harga_jual',
        'harga_beli',
        'total_beli',
    ];
    public function penjualan(){
        return $this->belongsTo(Penjualan::class, 'id_barang','id_barang');
    }
}
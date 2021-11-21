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
    ];

}

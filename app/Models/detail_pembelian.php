<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pembelian extends Model
{
    use HasFactory;
    protected $primaryKey='id_detail_pembelian';
    protected $guarded=['id_detail_pembelian'];
}

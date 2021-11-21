<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class penjualanController extends Controller
{
    public function index(){
        $barangs=Barang::all();
        return view('Keuangan.Mpenjualan',['Barang'=>$barangs]);
    }
}

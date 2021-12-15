<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\detail_penjualan;

class detailPenjualanController extends Controller
{
    public function index(){
        $detail_penjualan=detail_penjualan::all();
        return view('dashboard',['detail_penjualan'=>$detail_penjualan]);
    }
    public function create(Request $request){
        $detail_penjualan=detail_penjualan::create([
            'subtotal'=>$request->dibayar,
            'diterima'=>$request->diterima,
            'kembali'=>$request->kembali
        ]);
        
        $penjualans=Penjualan::truncate();

        $notifikasi=array(
            'pesan'=>'Transaksi selesai',
            'alert'=>'success',
        );

        return redirect('/penjualan')->with($notifikasi);
    }
}

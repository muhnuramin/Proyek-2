<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjualan;

class penjualanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $barangs=Barang::all();
        $penjualans=Penjualan::all();
        return view ('Keuangan.Mpenjualan',
        [
        'Barang'=>$barangs,
        'Penjualan'=>$penjualans
        ]);
    }

    public function create(Request $request){
        Penjualan::create([
            'id_barang'=>$request->id_barang,
            'name'=>$request->name,
            'merk'=>$request->merk,
            'harga'=>$harga=$request->harga,
            'qty'=>$qty=$request->qty,
            'subtotal'=>$harga*$qty
        ]);
        return redirect('/penjualan');
    }

    public function delete($id_penjualan){
        $penjualans=Penjualan::find($id_penjualan);
        $penjualans->delete();
        return redirect('/penjualan');
    }

}

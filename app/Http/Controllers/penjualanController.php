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
        $count = \DB::table('penjualans')->sum('subtotal');
        
        return view ('Keuangan.Mpenjualan',
        [
        'Barang'=>$barangs,
        'Penjualan'=>$penjualans,
        'count'=>$count
        ]);
    }

    public function create(Request $request){
        $harga_beli=$request->hb;
        
        Penjualan::create([
            'id_barang'=>$request->id_barang,
            'name'=>$request->name,
            'merk'=>$request->merk,
            'harga'=>$harga=$request->harga,
            'laba'=>$harga-$harga_beli,
            'qty'=>$qty=$request->qty,
            'subtotal'=>$harga*$qty,
            
        ]);
        $barangs=Barang::find($request->id_barang);
        $barangs->stock-=$qty;
        $barangs->update();
        
        return redirect('/penjualan');
    }

    public function delete($id_penjualan){
        $penjualans=Penjualan::find($id_penjualan);
        $penjualans->delete();
        return redirect('/penjualan');
    }

    public function clear(){
        $penjualans=Penjualan::truncate();
        return redirect('/penjualan');
    }

    public function getBarangId($id){
        $data = Barang::where('id_barang','=',$id)
                    ->first();
        return response()->json($data);
    }

    public function nota(){
        $penjualans=Penjualan::all();
        $countTotal = \DB::table('penjualans')->sum('subtotal');
        $tanggalAkhir=date('y/m/d');
        return view('Keuangan.Notapenjualan',
        [
            'Penjualan'=>$penjualans,
            'countTotal'=>$countTotal,
            'tanggalAkhir'=>$tanggalAkhir
        ]);
    }

}

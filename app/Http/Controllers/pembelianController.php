<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pembelian;

class pembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $barangs=Barang::all();
        $pembelians=Pembelian::all();
        $count = \DB::table('pembelians')->sum('subtotal');
        return view('Keuangan.Mpembelian',
        [
        'Barang'=>$barangs,
        'pembelian'=>$pembelians,
        'count'=>$count
        ]);
    }

    public function create(Request $request){
        $harga_beli=$request->hb;
        
        Pembelian::create([
            'id_barang'=>$request->id_barang,
            'name'=>$request->name,
            'merk'=>$request->merk,
            'harga'=>$harga=$request->harga,
            'laba'=>$harga-$harga_beli,
            'qty'=>$qty=$request->qty,
            'subtotal'=>$harga*$qty,
            
        ]);
        $barangs=Barang::find($request->id_barang);
        $barangs->stock+=$qty;
        $barangs->update();
        
        return redirect('/pembelian');
    }

    public function delete($id_pembelian){
        $pembelians=Pembelian::find($id_pembelian);
        $pembelians->delete();
        return redirect('/pembelian');
    }

    public function clear(){
        $pembelians=Pembelian::truncate();
        return redirect('/pembelian');
    }
    public function nota(){
        return view('Keuangan.Notapembelian');
    }
}

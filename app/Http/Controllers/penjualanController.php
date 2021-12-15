<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\detail_penjualan;
use App\Models\Laporan;

class penjualanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $barangs=Barang::all();
        $penjualans=Penjualan::whereNull("id_transaksi")->get();
        $count = \DB::table('penjualans')->whereNull("id_transaksi")->sum('subtotal');
        
        return view ('Keuangan.Mpenjualan',
        [
        'Barang'=>$barangs,
        'Penjualan'=>$penjualans,
        'count'=>$count
        ]);
    }

    public function create(Request $request){
        $harga_beli=$request->hb;
        
        $penjualan=Penjualan::create([
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
        Penjualan::whereNull("id_transaksi")->delete();
        // $penjualans=Penjualan::truncate();
        return redirect('/penjualan');
    }

    public function save(Request $request){
        $detail_penjualan=detail_penjualan::create([
            'subtotal'=>$request->subtotal,
            'diterima'=>$request->diterima,
            'kembali'=>$request->kembali,
            
        ]);
        $penjualan=Penjualan::whereNull("id_transaksi");
        $penjualan_data=$penjualan->get();
        // $laporan=Laporan::whereDate("created_at", date('Y-m-d')
        // );
        // dd($penjualan_data);
        foreach($penjualan_data as $l){
            $laporan=Laporan::whereDate("created_at", date('Y-m-d'))->updateOrCreate([
                'id_barang'=>$l->id_barang,
            ],
            [
                'total_penjualan'=>\DB::raw("total_penjualan + $l->subtotal"),
                'banyak_penjualan'=>\DB::raw("banyak_penjualan + $l->qty"),
                'pendapatan'=>\DB::raw("total_penjualan - total_pembelian"),
            ]
        );
        }
        $penjualan->update([
            'id_transaksi'=>$detail_penjualan->id_detail_penjualan,
        ]);
        
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

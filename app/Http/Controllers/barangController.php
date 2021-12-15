<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Laporan;
use PDF;

class barangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $barangs=Barang::all();
        return view('barang.Mbarang',['Barang'=>$barangs]);
    }

    public function create(Request $request){
        
        $barang=Barang::create([
            'name'=>$request->name,
            'merk'=>$request->merk,
            'stock'=>$stock=$request->stock,
            'harga_jual'=>$request->harga_jual,
            'harga_beli'=>$harga_beli=$request->harga_beli,
            'total_beli'=>$total_beli=$harga_beli*$stock,
        ]);
        // dd($barang);
        Laporan::create([
            'id_barang'=>$barang->id_barang,
            'total_pembelian'=>$barang->total_beli,
            'banyak_pembelian'=>$barang->stock,
        ]);
        
        $notifikasi=array(
            'pesan'=>'Barang berhasil ditambahkan',
            'alert'=>'success',
        );
        return redirect('/barang')->with($notifikasi);
    }

    public function update(Request $request){
        $barang=Barang::find($request->id_barang);
        $barang->id_barang=$request->id_barang;
        $barang->name=$request->name;
        $barang->merk=$request->merk;
        $barang->stock=$request->stock;
        $barang->harga_jual=$request->harga_jual;
        $barang->harga_beli=$request->harga_beli;
        $barang->total_beli=$barang->stock*$barang->harga_beli;
        $laporan=Laporan::whereDate(
            'created_at',
            date('Y-m-d')
        )->where(
            'id_barang', $barang->id_barang
        )->first();

        if ($laporan) {
            $laporan->update([
            'total_pembelian'=>$barang->total_beli,
            'banyak_pembelian'=>$barang->stock
            ]);
        }  else {
            Laporan::create([
                'id_barang'=>$barang->id_barang,
                'total_pembelian'=>$barang->total_beli,
                'banyak_pembelian'=>$barang->stock,
            ]);
        }
        $barang->save();
        $notifikasi=array(
            'pesan'=>'Barang berhasil diedit',
            'alert'=>'success',
        );
        return redirect('/barang')->with($notifikasi);
    }

    public function delete($id){
        $barang=Barang::find($id);
        $barang->delete();
        $notifikasi=array(
            'pesan'=>'barang berhasil dihapus',
            'alert'=>'warning',
        );
        return redirect('/barang')->with($notifikasi);
    }

    public function cetak_pdf(){
        $barang=Barang::all();
        $tanggalAkhir=date('y-m-d');
        $pdf = PDF::loadview('barang.mbarang_pdf', ['barang'=>$barang,'tanggalAkhir'=>$tanggalAkhir]);
        return  $pdf->stream();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

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
        Barang::create([
            'name'=>$request->name,
            'merk'=>$request->merk,
            'stock'=>$request->stock,
            'harga_jual'=>$request->harga_jual,
            'harga_beli'=>$request->harga_beli
        ]);
        $notifikasi=array(
            'pesan'=>'Barang berhasil ditambahkan',
            'alert'=>'success',
        );
        return redirect('/barang');
    }

    public function update(Request $request){
        $barang=Barang::find($request->id_barang);
        $barang->id_barang=$request->id_barang;
        $barang->name=$request->name;
        $barang->merk=$request->merk;
        $barang->stock=$request->stock;
        $barang->harga_jual=$request->harga_jual;
        $barang->harga_beli=$request->harga_beli;
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
}

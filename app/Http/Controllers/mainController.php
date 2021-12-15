<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use App\Models\detail_penjualan;

use App\Models\Laporan;
class mainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // $waktu=date('y-m-d');
        // $bulan=date('m');
        $barangs=Barang::all();
        $barangs2=Barang::whereStock('0')->get();

        $users=User::all();
        // $laporan=Laporan::whereMonth('created_at',$bulan)->get();
        $laporan=Laporan::all();
        $detail_penjualan=detail_penjualan::all();
        $countPenjualan=\DB::table('detail_penjualans')->sum('subtotal');
        $countBarang = \DB::table('barangs')->count();
        $countUser = \DB::table('users')->count();
        $countlaporan=\DB::table('laporans')->sum('total_penjualan');
        $countlaporan2=\DB::table('laporans')->sum('total_pembelian');
        $laporan=Laporan::all();
        $totalPenjualan = \DB::table('laporans')->sum('total_penjualan');
        $totalPembelian = \DB::table('laporans')->sum('total_pembelian');

        $cekStock = Barang::select([
            'id_barang', 'name', 'merk',
            \DB::raw("id_barang as Id"),
            \DB::raw('name as Nama'),
            \DB::raw('merk as Merk')
        ])
        ->where('stock', '<=', 0)
        ->get();
        return view('dashboard',
        [
            'countBarang'=>$countBarang,
            'countUser'=>$countUser,
            'detail_penjualan'=>$detail_penjualan,
            'barangs2'=>$barangs2,
            'countlaporan'=>$countlaporan,
            'countlaporan2'=>$countlaporan2,
            'totalPenjualan'=>$totalPenjualan,
            'totalPembelian'=>$totalPembelian,
            'cekStock'=>$cekStock
        ]);
    }
}

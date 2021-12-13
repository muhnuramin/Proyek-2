<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Barang;
use App\Models\Penjualan;

class laporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        // $barangs = Barang::select([
        //     'name',
        //     \DB::raw("DATE(created_at) as Tanggal_Beli"),
        //     \DB::raw('SUM(total_beli) as Total_Beli'),
        //     \DB::raw('COUNT(id_barang) as Banyak_Barang')
        // ])
        // ->groupBy('name')
        // ->groupBy('Tanggal_Beli')
        // ->get();

        $penjualans = Penjualan::select([
            'id_barang',
            \DB::raw("DATE(created_at) as Tanggal_Jual"),
            \DB::raw('SUM(subtotal) as Total_Jual'),
            \DB::raw('COUNT(id_penjualan) as Banyak_Jual')
        ])
        ->groupBy('id_barang')
        ->groupBy('Tanggal_jual')
        ->get();
        // dd($penjualans->first()->barang()->first());
        // return response()->json($penjualans, 200);
        $i = 0;
        $j = 0;
        $output = [];
        // while ($i < count($barangs) || $j < count($penjualans)) {
        //     if ($barangs[$i]['Tanggal_Beli'] == $penjualans[$i]['Tanggal_Jual']) {
                
        //     }
        // }
        // return response()->json($barangs, 200);
        $tanggalAwal=date('y-m-d',mktime(0,0,0,date('m'),1,date('y')));
        $tanggalAkhir=date('y-m-d');
        

        return view('Keuangan.MDataKeuangan',compact('tanggalAwal','tanggalAkhir','penjualans'));
    }
}

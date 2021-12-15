<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Laporan;

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

        $laporan = Laporan::select([
            // 'id_barang',
            \DB::raw("DATE(created_at) as Tanggal"),
            \DB::raw('SUM(total_penjualan) as Total_Jual'),
            \DB::raw('SUM(total_pembelian) as Total_Beli'),
            \DB::raw('SUM(pendapatan) as Pendapatan')
        ])
        // ->groupBy('id_barang')
        ->groupBy('Tanggal')
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
        

        return view('Keuangan.MDataKeuangan',compact('tanggalAwal','tanggalAkhir','laporan'));
    }

    public function getDetail($tanggal){
        //Cek apakah string adalah format tanggal
        if ($this->isDate($tanggal)) {            
            $laporan = Laporan::select([
                'barangs.name as name',
                'total_penjualan',
                'banyak_penjualan',
                'total_pembelian',
                'banyak_penjualan',
                'pendapatan'
            ])
            ->join('barangs', 'laporans.id_barang', '=', 'barangs.id_barang')
            ->whereDate("laporans.created_at", $tanggal)
            ->get();
            $data = [];
            foreach ($laporan as $l) {
                $temp = [];
                $temp = array_merge($temp, array($l['name']));
                $temp = array_merge($temp, array((string)$l['total_penjualan']));
                $temp = array_merge($temp, array((string)$l['banyak_penjualan']));
                $temp = array_merge($temp, array((string)$l['total_pembelian']));
                $temp = array_merge($temp, array((string)$l['banyak_penjualan']));
                $temp = array_merge($temp, array((string)$l['pendapatan']));
                array_push($data, $temp);
            }
            return response()->json($data);            
        }
    }

    public function isDate($value) {
        if (!$value) {
            return false;
        } else {
            $date = date_parse($value);
            if($date['error_count'] == 0 && $date['warning_count'] == 0){
                return checkdate($date['month'], $date['day'], $date['year']);
            } else {
                return false;
            }
        }
    }
}

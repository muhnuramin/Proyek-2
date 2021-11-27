<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Input;
class penjualanController extends Controller
{
    public function index(){
        $barangs=Barang::all();
        // $data = Barang::where('id_barang','=',$id)
        //                 ->first();
        return view('Keuangan.Mpenjualan',[
            'Barang'=>$barangs,
            // 'data_barang'=>$data
            ]);
        }

        //  

        public  function action(Request $request){
            $data = $request->all();
            $query = $data['query'];
            $filder_data = Barang::select('id')
                            ->where('id', 'LIKE', '%'.query,'%')
                            ->get();
            return response()->json($filder_data);
        }

        public function getCustomer(){
            $p = Barang::all();
            return response()->json($p);
        }

        public function getBarangId($id){
            $data = Barang::where('id_barang','=',$id)
                        ->first();
            return response()->json($data);
        }
}

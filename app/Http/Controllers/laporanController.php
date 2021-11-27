<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class laporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tanggalAwal=date('y-m-d',mktime(0,0,0,date('m'),1,date('y')));
        $tanggalAkhir=date('y-m-d');
        

        return view('Keuangan.MDataKeuangan',compact('tanggalAwal','tanggalAkhir'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;

class mainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $barangs=Barang::all();
        $users=User::all();
        $countBarang = \DB::table('barangs')->count();
        $countUser = \DB::table('users')->count();
        return view('dashboard',
        [
            'countBarang'=>$countBarang,
            'countUser'=>$countUser
        ]);
    }
}

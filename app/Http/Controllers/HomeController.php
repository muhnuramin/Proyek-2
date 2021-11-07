<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return redirect('/home');
        // $request=User::all();
        // dd($request);
        // if ($request->roles==('Barang')) {
        //     return redirect('/barang');
        // }elseif ($request->roles==('Kasir')) {
        //     return redirect('/');
        // }elseif ($request->roles==('Administrator')) {
        //     return redirect('/home');
        // }
    }
}

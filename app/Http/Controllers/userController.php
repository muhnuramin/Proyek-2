<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function index(){
        $users=User::all();
        return view('Muser',['User'=>$users]);
    }
}

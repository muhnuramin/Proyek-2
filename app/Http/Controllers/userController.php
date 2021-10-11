<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function index(){
        $users=User::all();
        return view('user.Muser',['User'=>$users]);
    }

    public function add(){
        return view('user.adduser');
    }

    public function create(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'roles'=>$request->roles
        ]);
        return redirect('/user');
    }
}

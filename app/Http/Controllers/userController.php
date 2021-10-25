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

    public function create(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'roles'=>$request->roles
        ]);
        return redirect('/user');
    }

    public function update(Request $request){
        $user=User::find($request->id);
        $user->id=$request->id;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->roles=$request->roles;
        $user->save();
        return redirect('/user');
    }

    public function delete($id){
        $user=User::find($id);
        $user->delete();
        return redirect('/user');
    }
}

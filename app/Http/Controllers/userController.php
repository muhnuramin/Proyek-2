<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $users=User::all();
        return view('user.Muser',['User'=>$users]);
    }

    public function create(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'roles'=>$request->roles
        ]);
        $notifikasi=array(
            'pesan'=>'User berhasil ditambahkan',
            'alert'=>'success',
        );
        
        return redirect('/user')->with($notifikasi);
    }

    public function update(Request $request){
        $user=User::find($request->id);
        $user->id=$request->id;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->roles=$request->roles;
        $user->save();
        $notifikasi=array(
            'pesan'=>'User berhasil diedit',
            'alert'=>'success',
        );
        return redirect('/user')->with($notifikasi);
    }

    public function delete($id){
        $user=User::find($id);
        $user->delete();
        $notifikasi=array(
            'pesan'=>'User berhasil dihapus',
            'alert'=>'warning',
        );
        return redirect('/user')->with($notifikasi);
    }
}

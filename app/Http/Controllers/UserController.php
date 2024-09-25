<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function RegisterFunction(Request $request){
        $insert=$request->validate([
            'name'=>['required',Rule::unique('users','name')],
            'password'=>'required|min:6|confirmed',
        ]);
            $insert['password']=bcrypt($insert['password']);
            $user=User::create($insert);
            Auth::login($user);
            return redirect('/login')->with('message','Reguster Success');
    }

    public function LoginFunction(Request $request){
        $login=$request->validate([
            'name'=>'required',
            'password'=>'required|min:6',
        ]);
        if (Auth::attempt($login)) {
            return redirect('/')->with('message','Login Success');
        }else{
            return back()->with('message','Login Failed');
        }
    }

    public function LogoutFunction(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('message','Logout Success');
    }
}

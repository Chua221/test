<?php

namespace App\Http\Controllers;

use App\Models\bills;
use App\Models\carts;
use App\Models\products;
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

    public function AddToCartFunction(Request $request,products $id){
        $condition=carts::where('user_id',Auth::user()->id)->where('p_id',$id->id)->get();
        if ($condition) {
            $addtocart=$request->validate([
                'p_mass'=>'required|numeric|min:100',
                'p_price'=>'required',
            ]);
            $addtocart['p_id']=$id->id;
            $addtocart['user_id']=Auth::user()->id;
            $addtocart['bill_id']=0;
            $addtocart['state']='pending';
            carts::create($addtocart);
            return redirect('/')->with('message','Add To Cart Success');
        }else {
            return redirect('/')->with('message','Add To Cart Failed Because There Have Same Product At');
        }
        
    }

    public function CheckOutFunction(Request $request){
        $checkout=bills::selectRaw('MAX(id) as id')->first();
        if ($checkout===null) {
            $billtime=1;
        }else {
            $billtime=$checkout->id+1;   
        }
        $update=carts::where('user_id',Auth::user()->id)->where('state','pending')
        ->update([
            'bill_id'=>$billtime,
            'state'=>'checkout',
        ]);

        if ($update) {
            bills::create([
                'b_id'=>$billtime
            ]);

            return redirect('/')->with('message','Check Out Success');
        }else {
            return redirect('/')->with('message','Check Out Failed');
        }

    }
}

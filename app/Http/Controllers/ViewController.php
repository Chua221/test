<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function ViewMain(){
        return view('main',[
            'alldata'=>products::all()
        ]);
    }

    public function ViewLogin(){
        return view('login');
    } 

    public function ViewRegister(){
        return view('register');
    } 

    public function ViewProduct($id){
        return view('view',[
            'product'=>products::find($id)
        ]);
    }

    public function ViewCart(){
        $cart=carts::join('products','carts.p_id','=','products.id')
        ->where('user_id',Auth::user()->id)->where('state','pending')->get();

        return view('cart',compact('cart'));
    }
    
}

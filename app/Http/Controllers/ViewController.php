<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

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
}

<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function(){
    Route::post("/register","RegisterFunction")->name('register');
    Route::post("/login","LoginFunction")->name('login');
    Route::post("/logout","LogoutFunction")->name('logout');
});

Route::controller(ViewController::class)->group(function(){
    Route::get("/","ViewMain");
    Route::get("/register","ViewRegister");
    Route::get("/login","ViewLogin");
    Route::get("/view/{id}","ViewProduct")->name('view');
});
<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function(){
    Route::get("/","ViewMain");
    Route::get("/register","ViewRegister");
    Route::get("/login","ViewLogin");
    Route::post("/register","RegisterFunction")->name('register');
    Route::post("/login","LoginFunction")->name('login');
});
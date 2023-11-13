<?php

use App\Http\Controllers\auth\LoginController;
use App\Livewire\HomePage;
use App\Livewire\UsersPage;
use Illuminate\Support\Facades\Route;

route::name('auth.')->group(function () {

    Route::middleware('guest')->group(function () {
   
        Route::get('login', [LoginController::class, 'index'])->name('login.index');

        Route::post('login', [LoginController::class, 'store'])->name('login.store');


    });

    route::middleware('auth')->group(function(){

        route::get('logout', [LoginController::class,'logout'])->name('logout');


    });
 
});
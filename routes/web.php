<?php

use App\Http\Middleware\CheckUserType;
use App\Livewire\Admin\CategoryPage;
use App\Livewire\HomePage;
use App\Livewire\Admin\TaskPage;
use App\Livewire\Admin\UsersPage;
use App\Models\Category;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/ 

Route::get('/', HomePage::class)->middleware('auth')->name('home');



Route::middleware(['auth'])->group(function () {


    Route::group([
        'prefix'     => 'admin',
        'Middleware' => 'check_type:admin',
        'as'         => 'admin.'
    ],function () {
        
        Route::get('/users', UsersPage::class)->name('users');
        Route::get('/tasks', TaskPage::class)->name('tasks');
        Route::get('/categories', CategoryPage::class)->name('categories');

    });



    Route::group([
        'prefix'     => 'user',
        'Middleware' => 'check_type:user',
        'as'         => 'user.'
    ],function () {

        Route::get('/tasks', TaskPage::class)->name('tasks');
  
    });



});



require __DIR__ . '/auth.php';

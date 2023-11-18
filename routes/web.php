<?php

use App\Livewire\CategoryPage;
use App\Livewire\HomePage;
use App\Livewire\TaskPage;
use App\Livewire\UsersPage;
use App\Models\Category;
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


    Route::middleware(['check_type:admin'])->group(function () {

        Route::get('/users', UsersPage::class)->name('users');
        Route::get('/tasks', TaskPage::class)->name('tasks');
        Route::get('/categories', CategoryPage::class)->name('categories');
    });
});



require __DIR__ . '/auth.php';

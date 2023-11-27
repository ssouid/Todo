<?php

use App\Http\Middleware\CheckUserType;
use App\Livewire\Admin\CategoryPage;
use App\Livewire\HomePage;
use App\Livewire\Admin\AdminTaskPage  as AdminTask;
use App\Livewire\User\TaskPage as UserTask;
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




Route::middleware(['auth'])->group(function () {

    Route::get('/', HomePage::class)->name('home');

    Route::group([
        'prefix'     => 'admin',
        'Middleware' => 'check_type:admin',
        'as'         => 'admin.'
    ], function () {

        Route::get('/users', UsersPage::class)->name('users');
        Route::get('/tasks', AdminTask::class)->name('tasks');
        Route::get('/categories', CategoryPage::class)->name('categories');
    });



    Route::group([
        'prefix'     => 'user',
        'Middleware' => 'check_type:user',
        'as'         => 'user.'
    ], function () {

        Route::get('/tasks', UserTask::class)->name('tasks');
    });
});



require __DIR__ . '/auth.php';

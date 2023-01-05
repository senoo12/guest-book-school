<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LivewireController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tampilan;
use App\Http\Livewire\Crud;
use App\Http\Livewire\Dashboard;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Route::get('crud', Crud::class);
});

// Route::get('/', [Crud::class, 'index']);
Route::resource('/guests', \App\Http\Controllers\Tampilan::class);
// Route::resource('/dashboard', \App\Http\Controllers\LivewireController::class);
// Route::resource('/', App\Http\Controllers\Admin::class);
// Route::get('admin', Dashboard::class);
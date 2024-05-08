<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HeadPhoneController;
use App\Http\Controllers\MacBookController;
use App\Http\Controllers\DressController;
use App\Http\Controllers\BonekaController;




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

Route::get('/', function () {
    return view('home');
})->name('home');


//----------------beli headphone ------------------------
Route::get('beli-headphone/{id}/delete', [App\Http\Controllers\HeadPhoneController::class, 'delete'])->name('beli.delete');
Route::resource('beli-headphone', HeadPhoneController::class);

//----------------beli macbook ------------------------
Route::get('beli-mackbook/{id}/delete', [App\Http\Controllers\MacBookController::class, 'delete'])->name('mackbook.delete');
Route::resource('beli-mackbook', MacBookController::class);

//----------------beli dress ------------------------
Route::get('beli-dress/{id}/delete', [App\Http\Controllers\DressController::class, 'delete'])->name('dress.delete');
Route::resource('beli-dress', DressController::class);

//----------------beli boneka ------------------------
Route::get('beli-boneka/{id}/delete', [App\Http\Controllers\BonekaController::class, 'delete'])->name('boneka.delete');
Route::resource('beli-boneka', BonekaController::class);


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroeController;
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
    return view('auth.login');
});

Route::get('/superheroe', function () {
    return view('superheroe.index');
});
Route::get('/superheroe/create',[SuperheroeController::class,'create']);

Route::resource('superheroe', SuperheroeController::class)->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [SuperheroeController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [SuperheroeController::class, 'index'])->name('home');
});

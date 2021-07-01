<?php

use App\Http\Controllers\StockController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

//ホーム画面（観た映画一覧）
Route::get('/',[StockController::class,'index'])->name('index');

//観た映画登録ページの表示
Route::get('/stock/',[StockController::class,'create'])->name('create');

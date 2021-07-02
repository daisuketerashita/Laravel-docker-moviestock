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

//ログイン後
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//使い方ページ
Route::get('/howto/',[StockController::class,'howto'])->name('howto');

//ログインユーザーのみアクセスできる
Route::group(['middleware' => 'auth'], function () {
    //ホーム画面（観た映画一覧）
    Route::get('/',[StockController::class,'index'])->name('index');
    //観た映画登録ページの表示
    Route::get('/stock/',[StockController::class,'create'])->name('create');
    //観た映画の登録処理
    Route::post('/stock/store/',[StockController::class,'store'])->name('store');
    //観た映画の詳細ページ
    Route::get('/detail/{id}/',[StockController::class,'detail'])->name('detail');
    //観た映画の削除機能
    Route::get('/delete/',[StockController::class,'delete'])->name('delete');

    //観たい映画一覧
    Route::get('/plan/',[PlanController::class,'index'])->name('plan.index');
    //観たい映画登録ページ
    Route::get('/plan/add/',[PlanController::class,'create'])->name('plan.create');
    //観たい映画登録処理
    Route::post('/plan/store/',[PlanController::class,'store'])->name('plan.store');
    //観たい映画の削除機能
    Route::get('/plan/delete/',[PlanController::class,'delete'])->name('plan.delete');
});
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    //トップページ（観た映画一覧）
    public function index(){

        return view('index');
    }
}

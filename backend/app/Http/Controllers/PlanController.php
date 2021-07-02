<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    //トップページ（観たい映画一覧）
    public function index(){
        //ユーザーに紐付いた一覧を取得
        $plans = Auth::user()->plans()->orderBy('created_at', 'DESC')->simplePaginate(6);

        return view('plan.index', compact('plans'));
    }

    //観たい映画の登録ページ表示
    public function create(){
        return view('plan.add');
    }
}

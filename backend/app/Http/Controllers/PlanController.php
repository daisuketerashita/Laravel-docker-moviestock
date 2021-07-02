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

    //観たい映画登録処理
    public function store(Request $request){
        $post = $request->all();
        //バリデーション
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('image')){
            $request->file('image')->store('/public/images');
            $data = [
                'user_id' => \Auth::id(),
                'title' => $post['title'],
                'image' => $request->file('image')->hashName()
            ];
        }else{
            $data = [
                'user_id' => \Auth::id(),
                'title' => $post['title'],
            ]; 
        }

        //データベースにINSERT
        Plan::insert($data);

        //観たい映画一覧ページへのリダイレクトとフラッシュメッセージ
        return redirect('/plan/')->with('flash_message', '登録が完了しました');
    }

    //観たい映画の削除機能
    public function delete(Request $request){
        $plan = Plan::find($request->id);
        $plan->delete();
        //リダイレクト
        return redirect('/plan/')->with('flash_message', '削除しました');
    }
}

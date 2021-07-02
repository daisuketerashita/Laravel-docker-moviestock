@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/howto.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="howto-container">
    <div class="howto-innner">
        <h2>①『追加する』ボタンを押す</h2>
        <img src="{{ asset('images/01_howto.png') }}" alt="">
        <h2>②『タイトル』『鑑賞日』『サムネイル』を入力する</h2>
        <img src="{{ asset('images/02_howto.png') }}" alt="">
    </div><!-- howto-innner -->
    <a href="{{ route('index') }}" class='btn btn-info btn-back'>さっそく使ってみる</a>
</div><!-- howto-container -->
@endsection
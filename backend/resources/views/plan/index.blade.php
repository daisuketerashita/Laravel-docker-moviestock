@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection

@section('content')
<h2 class="nav-item" id="insert_button">
    <a href="{{ route('create.plan') }}" class='nav-link'>追加する</a>
</h2>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card mb50">
            <div class="card-body">
                    <div class='image-wrapper'><img class='book-image' src=""></div>
                    <div class='image-wrapper'><img class='book-image' src=""></div>
                <h3 class='h3 book-title'>タイトル</h3>
                <a href="" class='btn btn-secondary detail-btn' onClick="delete_alert(event);return false;">削除する</a>
            </div>
        </div>
    </div>
</div>
@endsection
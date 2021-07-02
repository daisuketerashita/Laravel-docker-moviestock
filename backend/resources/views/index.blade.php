@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection

@section('content')
<h2 class="nav-item" id="insert_button">
    <a href="{{ route('create') }}" class='nav-link'>追加する</a>
</h2>
<div class="row justify-content-center">
    @foreach($stocks as $stock)
    <div class="col-md-4">
        <div class="card mb50">
            <div class="card-body">
                @if(!empty($stock->image))
                    <div class='image-wrapper'><img class='movie-image' src="{{ asset('storage/images/'.$stock->image) }}"></div>
                @else
                    <div class='image-wrapper'><img class='movie-image' src="{{ asset('images/dummy.png') }}"></div>
                @endif
                <h3 class='h3 movie-title'>{{ $stock->title }}</h3>
                <p class='description'>
                {{ $stock->formatted_due_date }}
                </p>
                <a href="{{ route('detail',['id' => $stock->id]) }}" class='btn btn-secondary detail-btn'>詳細を見る</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $stocks->links() }}
@endsection
@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection

@section('content')
<h2 class="nav-item" id="insert_button">
    <a href="{{ route('plan.create') }}" class='nav-link'>追加する</a>
</h2>
<div class="row justify-content-center">
    @foreach($plans as $plan)
    <div class="col-md-4">
        <div class="card mb50">
            <div class="card-body">
                @if(!empty($plan->image))
                    <div class='image-wrapper'><img class='movie-image' src="{{ asset('storage/images/'.$plan->image) }}"></div>
                @else
                    <div class='image-wrapper'><img class='movie-image' src="{{ asset('images/dummy.png') }}"></div>
                @endif
                <h3 class='h3 movie-title'>{{ $plan->title }}</h3>
                <a href="{{ route('plan.delete',['id' => $plan->id]) }}" class='btn btn-secondary detail-btn' onClick="delete_alert(event);return false;">削除する</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $plans->links() }}
@endsection
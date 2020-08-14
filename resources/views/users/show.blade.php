@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
            <p class="mb-0"><span>好きなワインの種類：</span>{!! nl2br(e($user->favorite_type)) !!}</p>
            <p class="mb-0"><span>好きなワインの味：</span>{!! nl2br(e($user->favorite_taste)) !!}</p>
            <p class="mb-0"><span>お気に入りのワイン：</span>{!! nl2br(e($user->recommended_wine)) !!}</p>
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            
            @if (count($tweets) > 0)
                @include('tweets.tweets', ['tweets' => $tweets])
            @endif
        </div>
    </div>
@endsection
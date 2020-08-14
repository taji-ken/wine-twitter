@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>検索</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'search.post']) !!}
                
                <div class="form-group">
                    {!! Form::radio('type', '赤' ,false , array('id' => 'red')) !!}
                    {!! Form::label('red', '赤') !!}
                    {!! Form::radio('type', '白' ,false , array('id' => 'white')) !!}
                    {!! Form::label('white', '白') !!}
                </div>
                
                <div class="form-group">
                    {!! Form::radio('taste', '甘口' ,false , array('id' => 'sweet')) !!}
                    {!! Form::label('sweet', '甘口') !!}
                    {!! Form::radio('taste', '辛口' ,false , array('id' => 'dry')) !!}
                    {!! Form::label('dry', '辛口') !!}
                </div>
                
                {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
        
    </div>
    @if (count($tweets) > 0)
    <ul class="list-unstyled">
        @foreach ($tweets as $tweet)
            <li class="media mb-3">
                <img class="mr-2 rounded" src="{{ Gravatar::src($tweet->user->email, 50) }}" alt="">
                <div class="media-body">
                    <div>
                        {!! link_to_route('users.show', $tweet->user->name, ['id' => $tweet->user->id]) !!} <span class="text-muted">posted at {{ $tweet->created_at }}</span>
                    </div>
                    <div>
                        <p class="mb-0"><span>ワインの種類：</span>{!! nl2br(e($tweet->type)) !!}</p>
                        <p class="mb-0"><span>ワインの味：</span>{!! nl2br(e($tweet->taste)) !!}</p>
                        <p class="mb-0">{!! nl2br(e($tweet->content)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $tweet->user_id)
                            {!! Form::open(['route' => ['tweets.destroy', $tweet->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $tweets->appends(request()->input())->links('pagination::bootstrap-4') }}
    @else
        <div>検索結果はありません</div>
    @endif


@endsection
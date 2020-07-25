@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'tweets.store']) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                    </div>
                    
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
                    
                    {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    
                {!! Form::close() !!}
            @endif
            @if (count($tweets) > 0)
                @include('tweets.tweets', ['tweets' => $tweets])
            @endif
        </div>
    </div>
@endsection
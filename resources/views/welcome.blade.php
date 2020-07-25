@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
                    </div>
                </div>
            </aside>
            <div class="col-sm-8">
                @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'tweets.store']) !!}
                        <div class="form-group">
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                        </div>
                    
                        <div class="form-group">
                            {!! Form::radio('favorite_type', '赤' ,false , array('id' => 'red')) !!}
                            {!! Form::label('red', '赤') !!}
                            {!! Form::radio('favorite_type', '白' ,false , array('id' => 'white')) !!}
                            {!! Form::label('white', '白') !!}
                        </div>
                
                        <div class="form-group">
                            {!! Form::radio('favorite_taste', '甘口' ,false , array('id' => 'sweet')) !!}
                            {!! Form::label('sweet', '甘口') !!}
                            {!! Form::radio('favorite_taste', '辛口' ,false , array('id' => 'dry')) !!}
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
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>WineTwitter</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection
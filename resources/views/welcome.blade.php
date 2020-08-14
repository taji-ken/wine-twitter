@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'tweets.store']) !!}
                        <div>最近飲んだワインの感想などを投稿</div>
                        <div class="form-group">
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                        </div>
                        
                        <div>ワインの種類と味を選択</div>
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
            </aside>
            <div class="col-sm-8">
                @if (count($tweets) > 0)
                    @include('tweets.tweets', ['tweets' => $tweets])
                @endif
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>WineTwitter</h1>
                {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}

            </div>
        </div>
    @endif
@endsection
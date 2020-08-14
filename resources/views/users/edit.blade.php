@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>プロフィール編集</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    <p>好きなワインの種類</p>
                    {!! Form::radio('favorite_type', '赤' ,false , array('id' => 'red')) !!}
                    {!! Form::label('red', '赤') !!}
                    {!! Form::radio('favorite_type', '白' ,false , array('id' => 'white')) !!}
                    {!! Form::label('white', '白') !!}
                </div>
                
                <div class="form-group">
                    <p>好きなワインの味</p>
                    {!! Form::radio('favorite_taste', '甘口' ,false , array('id' => 'sweet')) !!}
                    {!! Form::label('sweet', '甘口') !!}
                    {!! Form::radio('favorite_taste', '辛口' ,false , array('id' => 'dry')) !!}
                    {!! Form::label('dry', '辛口') !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('recommended', '一番おすすめのワイン') !!}
                    {!! Form::text('recommended_wine', old('recommended_wine'), ['class' => 'form-control']) !!}
                </div>
                
                <div><a href="https://ja.gravatar.com/">Gravatar</a>でプロフィール写真を登録できます</div>
                
                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block mt-4 mb-5']) !!}
            {!! Form::close() !!}
            
            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete',]) !!}
                {!! Form::submit('退会', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
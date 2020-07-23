@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Sign up</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
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
                
                <div class="form-group">
                    {!! Form::label('recommended', '一番おすすめのワイン') !!}
                    {!! Form::text('recommended_wine', old('recommended_wine'), ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
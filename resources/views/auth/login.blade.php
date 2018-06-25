@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Log In</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'login.post']) !!}
                

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

               

                {!! Form::submit('Log In', ['class' => 'button']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
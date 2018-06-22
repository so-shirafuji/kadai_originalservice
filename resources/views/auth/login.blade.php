@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">Log In</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! form::label('email', 'E-mail') !!}
                        {!! form::email('email', old('email'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! form::label('Password', 'Password') !!}
                        {!! form::password('Password', ['class' => 'form-control']) !!}
                    </div>

            </div>
        
        </div>
        
        
                    <div class="text-right">
                        {!! form::submit('Log In', ['class' => 'button']) !!}
                  
                {!! form::close() !!}
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('cover')
@endsection

@section('content')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>Medium Rare</h1>
                
                <div class="img">
                <img src=images/veg.jpg alt="top" height="500px", width="1000px">
                
                <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
                </div>
                
                
                <br>
                <a href="{{ route('signup.get') }}" class="btn btn-success btn-lg">Sign Up</a>
                <a href="{{ route('user.show') }}" class="btn btn-success btn-lg">Log In</a>
            </div>
        </div>
    </div>
  
@endsection
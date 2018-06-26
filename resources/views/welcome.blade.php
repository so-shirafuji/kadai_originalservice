@extends('layouts.app')

@section('cover')
@endsection

@section('content')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                
                
                <div class="img">
                <img src=images/3.jpg alt="top" height="500px", width="900px">
                
                <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
               
                </div>
                
                
                <br>
                
                <a href="{{ route('signup.get') }}" class="bt"><div id="a">Sign Up</div></a>
                
                <a href="{{ route('login') }}" class="bt"><div id="a">Log In</div></a>
                
            </div>
        </div>
    </div>
  
@endsection
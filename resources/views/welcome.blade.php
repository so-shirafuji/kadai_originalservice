@extends('layouts.app')

@section('cover')
@endsection

@section('content')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>Medium Rare</h1>
                <img src=images/veg.jpg alt="top">
                <br>
                <a href="{{ route('signup.get') }}" class="btn btn-success btn-lg">Sign Up</a>
                <a href="{{ route('login') }}" class="btn btn-success btn-lg">Log In</a>
            </div>
        </div>
    </div>
  
@endsection
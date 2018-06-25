@extends('layouts.app')

@section('content')
    <h1>{{ $category }}</h1>
     <p>{{ $name_kana }}</p>
    <h2>{{ $name }}</h2>
    <img src="{{ $image }}" alt="restaurant image" >
    <p>Open　{{ $opentime }}</p>
    <p>{{ $tel }}</p>
    <p>{{ $line }} {{ $station }}</p>
    <p>{{ $address }}</p>
    <p>{{ $latitude }}</p>
    <p>{{ $longitude }}</p>
    
    <a href="{{ $url }}">Check It Out</a>
@endsection
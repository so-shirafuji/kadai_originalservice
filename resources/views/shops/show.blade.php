@extends('layouts.app')

@section('content')
    <h1>{{ $category }}</h1>
     <p>{{ $name_kana }}</p>
    <h2>{{ $name }}</h2>
    <img src="{{ $image }}" alt="restaurant image" >
    <p>営業時間　{{ $opentime }}</p>
    <p>{{ $tel }}</p>
    <p>{{ $line }} {{ $station }}</p>
    <p>{{ $address }}</p>
    <p>{{ $latitude }}</p>
    <p>{{ $longitude }}</p>
    
    <a href="{{ $url }}">ぐるなびでチェック</a>
@endsection
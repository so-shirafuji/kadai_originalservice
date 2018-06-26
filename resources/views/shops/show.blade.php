@extends('layouts.app')

<link rel="stylesheet" href="{{ secure_asset('css/show.css') }}">

@section('content')
    <div class="category">
    <h1>{{ $category }}</h1>
    </div>
    
    <div class="name_kana">
    <p>{{ $name_kana }}</p>
    </div>
    
    <div class="name">
    <h2>{{ $name }}</h2>
    </div>
    
    <div class="img">
    <img src="{{ $image }}" alt="restaurant image" >
    </div>
    
    <table class="table-bordered">
        <tr>
            <td>Open</td>
            <td>{{ $opentime }}</td>
        </tr>
    
        <tr>
            <td>電話番号 </td>
            <td class=><a href="mailto:"></a>{{ $tel }}</td>
        </tr>
    
        <tr>
            <td>住所</td>
            <td>{{ $address }}</td>
        </tr>
    
        <tr>
            <td>最寄り駅 </td>
            <td>{{ $line }} {{ $station }}</td>
        </tr>
    </table>
    
    
    
    <!--<p>{{ $latitude }}</p>-->
    <!--<p>{{ $longitude }}</p>-->
    
    <a href="{{ $url }}">Check It Out</a>
@endsection
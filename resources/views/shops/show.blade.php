@extends('layouts.app')

<link rel="stylesheet" href="{{ secure_asset('css/show.css') }}">

@section('content')
    
<div id="detail">    
    <!--<div class="category">-->
    <!--<h2>{{ $category }}</h2>-->
    <!--</div>-->
    
    <!--<div class="panel panel-default">-->
    <!--<div class="name_kana">-->
    <!--<p>{{ $name_kana }}</p>-->
    <!--</div>-->
    
    <div class="name">
    <h1>{{ $name }}</h1>
    </div>
</div> 

    <div class="shopimg" id="clearfix">
    <img src="{{ $image }}" alt="restaurant image" height="250px", width="300px" >
    </div>
    
    </div>



    <table class="table-bordered" id="clearfix">
        <tr>
            <th>open</th>
            <td>{{ $opentime }}</td>
        </tr>
    
        <tr>
            <th>tel</th>
            <td class=><a href="mailto:"></a>{{ $tel }}</td>
        </tr>
    
        <tr>
            <th>address</th>
            <td>{{ $address }}</td>
        </tr>
    
        <tr>
            <th>location</th>
            <td>{{ $line }} {{ $station }}</td>
        </tr>
        
        <tr>
            <th>URL</th>
            <td><a href="{{ $url }}">Check It Out</a></td>
        </tr>    
    
    </table>
    
    
    
    <!--<p>{{ $latitude }}</p>-->
    <!--<p>{{ $longitude }}</p>-->

@endsection
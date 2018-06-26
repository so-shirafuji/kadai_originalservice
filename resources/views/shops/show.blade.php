@extends('layouts.app')

@section('head-plus')
<link rel="stylesheet" href="{{ secure_asset('css/show.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

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



    <table class="table-bordered" >
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
    
    <div class="twitter">
    <p>
      <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          <span class="fa fa-twitter"></span>images from twitter
</a>
   
    </p>
    <div class="collapse" id="collapseExample">
       @foreach($twitterImages as $imagins)
        <img src="{{ $imagins }}" alt="restaurant image" height="250px", width="300px" >
        @endforeach
    </div>
    </div>
    
    
    
    
    
    
    
    <!--<p>{{ $latitude }}</p>-->
    <!--<p>{{ $longitude }}</p>-->

@endsection
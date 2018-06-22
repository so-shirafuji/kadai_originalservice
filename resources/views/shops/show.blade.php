@extends('layouts.app')

@section('content')
    <h1>Hello</h1>
    <h2>{{ $name }}</h2>
    <p>{{ $address }}</p>
    <img src="{{ $image }}" alt="restaurant image" >
@endsection
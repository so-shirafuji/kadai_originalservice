@extends('layouts.app')

@section('content')
    <div class="search">
        <div class="row">
            <div class="text-center">
                {!! Form::open(['route' => 'shops.create', 'method' => 'get', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                        {!! Form::text('area', $area, ['class' => 'form-control input-lg', 'placeholder' => 'Area', 'size' => 40]) !!}
                      
                    </div>
                    
                    <div class="form-two">
                          {!! Form::text('keyword', $keyword, ['class' => 'form-control input-lg', 'placeholder' => 'Keyword', 'size' => 40]) !!}
                    </div>
                     </br>
                    {{-- {!! Form::submit('Search', ['class' => 'buttonbutton']) !!} --}}
                    <button class="hoge"><span class="glyphicon glyphicon-search">SEARCH</button>
                   
                {!! Form::close() !!}
                 </span>
            </div>
        </div>
    </div>

    @include('shops.shops', ['shops' => $shops])
@endsection
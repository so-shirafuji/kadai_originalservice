@extends('layouts.app')

@section('content')
    <div class="search">
        <div class="row">
            <div class="text-center">
                {!! Form::open(['route' => 'shops.create', 'method' => 'get', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                        {!! Form::text('area', $area, ['class' => 'form-control input-lg', 'placeholder' => 'エリアを入力', 'size' => 40]) !!}</br>
                        {!! Form::text('keyword', $keyword, ['class' => 'form-control input-lg', 'placeholder' => 'キーワードを入力', 'size' => 40]) !!}
                    </div></br>
                    {!! Form::submit('お店を検索', ['class' => 'btn btn-success btn-lg']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @include('shops.shops', ['shops' => $shops])
@endsection
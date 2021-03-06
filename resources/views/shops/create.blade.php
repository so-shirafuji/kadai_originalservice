@extends('layouts.app')

@section('head-plus')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
@endsection

@section('content')
    <div class="search">
        <div class="row">
            <div class="text-center">
                {!! Form::open(['route' => 'shops.create', 'method' => 'get', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                       
                        <!-- display area options -->
                        <select name="arealist" class="selectpicker" data-live-search="true" title="Area">
                            <?php $prefHolder = ''; ?>
                            @foreach($areaData as $val)
                                @if($val->areacode_m == $area)
                                    <option value="{{ $val->areacode_m }}" selected>
                                @else
                                    <option value="{{ $val->areacode_m }}">
                                @endif
                                    {{ $val->areaname_m }}, {{ $val->pref->pref_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-two">
                          {!! Form::text('keyword', $keyword, ['class' => 'form-control', 'placeholder' => 'Keyword', 'size' => 55]) !!}
                    </div>
                     </br>
                    {{-- {!! Form::submit('Search', ['class' => 'hoge']) !!} --}}
                    <button class="buttonjr btn-xs">SEARCH</button>
                   
                {!! Form::close() !!}
                 </span>
            </div>
        </div>
    </div>

    @include('shops.shops', ['shops' => $shops])
@endsection
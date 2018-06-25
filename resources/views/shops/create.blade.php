@extends('layouts.app')

@section('head-plus')
    <script src="{{ asset('js/search.js') }}"></script>
@endsection

@section('content')
    <div class="search">
        <div class="row">
            <div class="text-center">
                {!! Form::open(['route' => 'shops.create', 'method' => 'get', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                        {{-- {!! Form::text('area', $area, ['class' => 'form-control input-lg', 'placeholder' => 'Area', 'size' => 40]) !!} --}}
                        <!-- search field -->
                        <div contenteditable="true" id="search-field" onkeyup="searchList('search-field', 'search-subject', 'comment')" style="border: 1px solid black; width: 250px;"></div>
                        <!-- hidden val to submit (area code) -->
                        <input type="hidden" id="submitInputFieldIdName" name="submitInputFieldIdName" value=""> 
                        <!-- display area options -->
                        @foreach($areaData as $val)
                            <div class="search-subject" onclick="setOption('search-field', event, 'submitInputFieldIdName', '{{ $val->areacode_m }}', 'search-subject')">
                                {{ $val->areaname_m }}
                            </div>
                        @endforeach
                        <!--js to undisplay area options-->
                        <script>
                            doNotDisplayByClass('search-subject'); // do not display options on load
                        </script>
                    </div>
                    <!-- comment section -->
                    <p id="comment"></p>
                    
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
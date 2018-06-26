<link rel="stylesheet" href="{{ secure_asset('css/index.css') }}">

@if (count($shops) > 0)
    <div class="row">
        @foreach ($shops as $key => $shop)
            <div class="shop">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center trim">
                            <img src="{{ $shop->image }}" alt="" class="">
                        </div>
                        <div class="panel-body">
                            @if ($shop->id)
                                {{ Form::open(['route' => 'shops.store', 'method' => 'post']) }}
                                    <input type="hidden" name="name" value="{{ $shop->name }}">
                                    <input type="hidden" name="image" value="{{ $shop->image }}">
                                    <input type="hidden" name="address" value="{{ $shop->address }}">
                                    <input type="hidden" name="name_kana" value="{{ $shop->name_kana }}">
                                    <input type="hidden" name="latitude" value="{{ $shop->latitude }}">
                                    <input type="hidden" name="longitude" value="{{ $shop->longitude }}">
                                    <input type="hidden" name="category" value="{{ $shop->category }}">
                                    <input type="hidden" name="tel" value="{{ $shop->tel }}">
                                    <input type="hidden" name="url" value="{{ $shop->url }}">
                                    <input type="hidden" name="line" value="{{ $shop->line }}">
                                    <input type="hidden" name="station" value="{{ $shop->station }}">
                                    <input type="hidden" name="opentime" value="{{ $shop->opentime }}">
                                {{ Form::close() }}
                                <p class="shop-title">{{ $shop->name }}</p>
                            @else
                                <p class="shop-title">{{ $shop->name }}</p>
                            @endif
                            <div class="buttons ">
                                @if (Auth::check())  
<<<<<<< HEAD
                                     @include('shops.favorite_button', ['shop_id' => $shop->code])  
=======
                                    {{ Form::submit('detail') }}
                                     @include('shops.favorite_button', ['shop' => $shop])  
>>>>>>> e10f385e57833d3d0a6797ce5a0d4ff8c994a271
                                @endif 
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
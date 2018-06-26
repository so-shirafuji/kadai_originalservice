
<link rel="stylesheet" href="{{ secure_asset('css/create.css') }}">




@if (count($shops) > 0)
    <div class="row">
        @foreach ($shops as $key => $shop)
            <div class="shop">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $shop->image }}" alt="" class="">
                        </div>
                        <div class="panel-body">
                            @if ($shop->id)
                                
                                <p class="shop-title">{{ $shop->name }}</p>
                            @else
                                <p class="shop-title">{{ $shop->name }}</p>
                            @endif
                            <div class="buttons ">
                                @if (Auth::check())  

                                     @include('shops.favorite_button', ['shop_id' => $shop->code])  
                                @endif 
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@if ($shops)
    <div class="row">
        @foreach ($shops as $key => $shop)
            <div class="shop">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $shop->image_url->shop_image1 }}" alt="" class="">
                        </div>
                        <div class="panel-body">
                            @if ($shop->id)
                                {{ Form::open(['route' => 'shops.store', 'method' => 'post']) }}
                                    <input type="hidden" name="name" value="{{ $shop->name }}">
                                    {{ Form::submit('detail') }}
                                {{ Form::close() }}
                                <p class="shop-title">{{ $shop->name }}</p>
                            @else
                                <p class="shop-title">{{ $shop->name }}</p>
                            @endif
                            <!--<div class="buttons text-center">-->
                                {{-- @if (Auth::check()) --}}
                                    {{-- @include('shops.favorite_button', ['shop' => $shop]) --}}
                                {{-- @endif --}}
                            <!--</div>-->
                        </div>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
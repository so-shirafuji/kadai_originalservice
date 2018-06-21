@if ($shops)
    <div class="row">
        @foreach ($shops as $key => $shop)
            <div class="shop">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $shop->image_url }}" alt="" class="">
                        </div>
                        <div class="panel-body">
                            @if ($shop->id)
                                <p class="shop-title"><a href="{{ route('shops.show', $shop->id) }}">{{ $shop->name }}</a></p>
                            @else
                                <p class="shop-title">{{ $shop->name }}</p>
                            @endif
                            <div class="buttons text-center">
                                @if (Auth::check())
                                    @include('shops.favorite_button', ['shop' => $shop])
                                @endif
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="shop">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <img src="{{ $shop->image_url }}" alt="ぐるなび">
                    </div>
                    <div class="panel-body">
                        <p class="shop-title">{{ $shop->name }}</p>
                        <div class="buttons text-center">
                            @if (Auth::check())
                                @include('shops.favorite_button', ['shop' => $shop])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="favorite-users">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        お気に入りしたユーザ
                    </div>
                    <div class="panel-body">
                        @foreach ($favorite_users as $user)
                            <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                            <p>メニュー</p>
                            <P>Twitter</P>
                            <p>地図</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <p class="text-center"><a href="{{ $shop->url }}" target="_blank">ぐるなび詳細ページへ</a></p>
        </div>
    </div>
@endsection
@if (Auth::user()->is_favoriteing($shop_id))
    {!! Form::open(['route' => 'unfavorite', 'method' => 'delete']) !!}
        {!! Form::hidden('shopCode', $shop_id) !!}
        {!! Form::submit('unfavorite', ['class' => 'heart']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'favorite', 'method' => 'post']) !!}
        {!! Form::hidden('shopCode', $shop_id) !!}
        {!! Form::submit('favorite', ['class' => 'heart']) !!}
    {!! Form::close() !!}
@endif
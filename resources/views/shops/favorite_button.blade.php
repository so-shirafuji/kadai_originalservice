@if (Auth::user()->is_favoriteing($shop->id))
    {!! Form::open(['route' => 'unfavorite', 'method' => 'delete']) !!}
        {!! Form::hidden('shopCode', $shop->id) !!}
        {!! Form::submit('unfavorite', ['class' => 'heart']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'favorite']) !!}
        {!! Form::hidden('shopCode', $shop->id) !!}
        {!! Form::submit('favorite', ['class' => 'heart']) !!}
    {!! Form::close() !!}
@endif
@if (Auth::user()->is_favoriteing($shop->id))
    {!! Form::open(['route' => 'unfavorite', 'method' => 'delete']) !!}
        {!! Form::hidden('shopCode', $shop->id) !!}
        {!! Form::submit('unfavorite', ['class' => 'btn-primary']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'favorite']) !!}
        {!! Form::hidden('shopCode', $shop->id) !!}
        {!! Form::submit('favorite', ['class' => 'btn btn-inf']) !!}
    {!! Form::close() !!}
@endif
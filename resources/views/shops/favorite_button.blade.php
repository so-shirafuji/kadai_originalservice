@if (Auth::user()->is_favoriteing($item->code))
    {!! Form::open(['route' => 'unfavorite', 'method' => 'delete']) !!}
        {!! Form::hidden('itemCode', $item->code) !!}
        {!! Form::submit('favorite', ['class' => 'btn-primary']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'favorite']) !!}
        {!! Form::hidden('itemCode', $item->code) !!}
        {!! Form::submit('favorite it', ['class' => 'btn btn-inf']) !!}
    {!! Form::close() !!}
@endif
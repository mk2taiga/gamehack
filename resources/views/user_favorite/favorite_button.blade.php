@if (Auth::check())
    @if (Auth::user()->is_favorite($tweet->id))
        {!! Form::open(['route' => ['user.unfavorite', $tweet->id], 'method' => 'delete']) !!}
            {!! Form::submit('お気に入り済み', ['class' => "btn btn-default btn-long"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favorite', $tweet->id]]) !!}
            {!! Form::submit('お気に入り', ['class' => "btn btn-default btn-long"]) !!}
        {!! Form::close() !!}
    @endif
@endif
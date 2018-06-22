@if (Auth::id() != $user->id)
    @if (Auth::user()->is_favoriting($user->id))
        {!! Form::open(['route' => ['user.unfavorite', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('unfavorite', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favorite', $user->id]]) !!}
            {!! Form::submit('favorite', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif
@if (Auth::user()->is_favoriting($post->id))
    {!! Form::open(['route' => ['user.unfavorite', $post->id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-star fa-lg"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-warning'] )  !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['user.favorite', $post->id]]) !!}
        {!! Form::button('<i class="far fa-star fa-lg"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-warning'] )  !!}
    {!! Form::close() !!}
@endif
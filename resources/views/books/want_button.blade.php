@if (Auth::user()->is_wanting($book->isbn))
    {!! Form::open(['route' => 'book_user.dont_want', 'method' => 'delete']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::submit('Wanted', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'book_user.want']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::submit('Want', ['class' => 'btn btn-outline-success']) !!}
    {!! Form::close() !!}
@endif
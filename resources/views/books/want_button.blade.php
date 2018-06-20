@if (Auth::user()->is_wanting($book->isbn))
    {!! Form::open(['route' => 'book_user.dont_want', 'method' => 'delete']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::button('<i class="fas fa-heart"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-danger'] )  !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'book_user.want']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::button('<i class="far fa-heart"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-danger'] )  !!}
    {!! Form::close() !!}
@endif

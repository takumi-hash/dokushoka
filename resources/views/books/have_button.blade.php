@if (Auth::user()->is_having($book->isbn))
    {!! Form::open(['route' => 'book_user.dont_have', 'method' => 'delete']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::button('<i class="fas fa-check-circle"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-success'] )  !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'book_user.have']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::button('<i class="far fa-check-circle"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-success'] )  !!}
    {!! Form::close() !!}
@endif

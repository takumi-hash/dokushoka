@if (Auth::user()->is_wanting($book->isbn))
    {!! Form::open(['route' => 'book_user.dont_have', 'method' => 'delete']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::button('You have <i class="fas fa-check"></i>', ['type' => 'submit', 'class' => 'btn btn-block btn-info'] )  !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'book_user.have']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::button('Have <i class="fas fa-plus"></i>', ['type' => 'submit', 'class' => 'btn btn-block btn-outline-info'] )  !!}
    {!! Form::close() !!}
@endif

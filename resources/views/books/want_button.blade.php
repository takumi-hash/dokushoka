@if (Auth::user()->is_wanting($book->isbn))
    {!! Form::open(['route' => 'book_user.dont_want', 'method' => 'delete']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::button('Wanted <i class="fas fa-check"></i>', ['type' => 'submit', 'class' => 'btn btn-block btn-success'] )  !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'book_user.want']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::button('Want <i class="fas fa-plus"></i>', ['type' => 'submit', 'class' => 'btn btn-block btn-outline-success'] )  !!}
    {!! Form::close() !!}
@endif

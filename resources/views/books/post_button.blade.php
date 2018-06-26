{!! Form::open(['route' => 'book_user.want']) !!}
    {!! Form::hidden('id', $book->id) !!}
    {!! Form::button('<i class="fas fa-pen-nib"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-danger'] )  !!}
{!! Form::close() !!}

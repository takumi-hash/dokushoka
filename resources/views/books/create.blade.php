@extends('layouts.app')

@section('content')
<div class="container-fluid"></div>
        <div class="row">
            <div class="container">
                <div class="col-md-6 offset-md-3">
                    {!! Form::open(['route' => 'books.create', 'method' => 'get', 'class' => 'form-group']) !!}
                        <div class="form-group">
                            {!! Form::text('q_title', $q_title, ['class' => 'form-control input', 'placeholder' => '書籍タイトル', 'size' => 40]) !!}
                            {!! Form::text('q_author', $q_author, ['class' => 'form-control input', 'placeholder' => '著者名', 'size' => 40]) !!}
                        </div>
                        {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
            </div>
            </div>
        </div>
    @include('books.books', ['books' => $books])
@endsection

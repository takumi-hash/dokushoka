@extends('layouts.app')

@section('content')
    <h1>Haveランキング</h1>
    @include('books.books', ['books' => $books])
@endsection
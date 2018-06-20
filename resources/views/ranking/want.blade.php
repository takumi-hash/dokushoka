@extends('layouts.app')

@section('content')
    <h1>Wantランキング</h1>
    @include('books.books', ['books' => $books])
@endsection
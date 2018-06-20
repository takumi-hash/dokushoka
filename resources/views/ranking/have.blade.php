@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Haveランキング</h>
    @include('books.books', ['books' => $books])
</div>
@endsection
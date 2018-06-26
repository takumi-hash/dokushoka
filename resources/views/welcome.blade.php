@extends('layouts.app')

@section('cover')
    <div class="jumbotron jumbotron-fluid jumbotron-extend">
        <div class="container text-center">
            <h1 class="">素敵な本と出会う場所</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    @if (!Auth::check())
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-5">ドクショカを始める</a>
    @endif
        </div>
    </div>
@endsection

@section('content')
<div class="container">
    <h2 class="text-dark">Books Recently Viewed</h2>
    @include('books.books')
    {!! $books->render() !!}
</div>
<div class="bg-dark">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-light my-4">Reviews Recently Posted</h2>
            @include('posts.posts')
            {!! $books->render() !!}
        </div>
    </div>
</div>
@endsection

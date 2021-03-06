@extends('layouts.app')

@section('cover')
    <div class="jumbotron jumbotron-fluid jumbotron-extend">
        <div class="container text-center">
            <h1 class="">素敵な本とであう場所</h1>
            <p class="lead">——ドクショカ——</p>
    @if (!Auth::check())
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-5">ドクショカを始める</a>
    @elseif(Auth::check())
            <div class="row">
                <div class="mx-auto">
                    {!! Form::open(['route' => 'books.create', 'method' => 'get', 'class' => 'form-inline']) !!}
                    {!! Form::text('q_title', null, ['class' => 'form-control input', 'placeholder' => '書評を書きたい本を検索！', 'size' => 40]) !!}
                    {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
    @endif
        </div>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-dark">Books Recently Viewed</h2>
        </div>
        <div class="container">
            @include('books.books')
            {!! $books->render() !!}
        </div>
    </div>
</div>
<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-light my-4">Reviews Recently Posted</h2>
            @include('posts.posts')
            {!! $books->render() !!}
        </div>
    </div>
</div>
@endsection

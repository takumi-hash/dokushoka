@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 d-flex align-items-center p-3 py-5">
                <div class="col-6">
                    <img class="book-img rounded" src="{{ $book->image_url }}" alt="{{ $book->title }}">
                </div>
                <div class="col-6">
                    <div class="text-dark">
                        @if ($book->id)
                        <p class="h4"><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></p>
                        @else
                        <p class="font-weight-normal">{{ $book->title }}</p>
                        @endif
                        <p class="author">{{ $book->author }}</p>
                        <hr>
                    </div>
                    <div class="">
                        <div class="btn-group">
                            @if (Auth::check())
                                @include('books.want_button', ['book' => $book])
                                @include('books.have_button', ['book' => $book])
                            @endif
                            <a href="{{ $book->url }}" class="btn btn-link text-info"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 d-flex align-items-center p-3 py-5">
                <div>
                    <h5>あらすじ</h5>
                    <p class="text-justify">{{ $book->caption }}</p>
                    <h5>Wantしたユーザー</h5>
                    @foreach ($want_users as $user)
                        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                    @endforeach
                    <h5>Haveしたユーザ</h5>
                        @foreach ($have_users as $user)
                        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @endforeach
                    <p class="text-center">
                        <a href="{{ $book->url }}" target="_blank">楽天詳細ページへ</a>
                    </p>
                </div>
                    
            </div>
        </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="text-center">
            <img src="/images/user.jpg" alt="" class="rounded-circle user_photo">
        </div>
        <div class="text-center">
            <h2 class="font-weight-light">{{ $user->name }}</h1>
        </div>
        <div class="text-center row">
            <div class="border-right col-md-2">
                <p class="lead">Posts</p>
                <p id="" class="status-value">
                    {{ $count_posts }}
                </p>
            </div>
            <div class="border-right col-md-2">
                <p class="lead">Books</p>
                <p id="have_count" class="status-value">
                    {{ $count_have }}
                </p>
            </div>
            <div class="border-right col-md-2">
                <p class="lead">Wants</p>
                <p id="want_count" class="status-value">
                    {{ $count_want }}
                </p>
            </div>
            <div class="border-right col-md-2">
                <p class="lead">
                    Followers
                </p>
                <p id="followers" class="status-value">
                    211
                </p>
            </div>
            <div class="border-right col-md-2">
                <p class="lead">
                    Following
                </p>
                <p id="followers" class="status-value">
                    162
                </p>
            </div>
            <div class="col-md-2">
                <p class="lead">
                    Likes
                </p>
                <p id="following" class="status-value">
                    13
                </p>
            </div>
        </div>
    </div>
    @include('books.books', ['books' => $books])
    {!! $books->render() !!}
@endsection

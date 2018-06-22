@extends('layouts.app')

@section('content')
    <div class="p-5 bg-dark text-center">
        <div class="mt-5 mb-3">
            <img src="/images/user{{ $user->id }}.jpg" alt="" class="rounded-circle user-photo">
        </div>
        <h2 class="font-weight-normal text-light">{{ $user->name }}</h2>
        <p class="lead mt-3 text-light"><i class="fas fa-quote-left text-white-50 mr-3"></i>Self introduction goes here. To be implemented later.<i class="fas fa-quote-right text-white-50 ml-3"></i></p>
            @if (Auth::user()->id != $user->id)
                @if (Auth::user()->is_followed($user->id))
                <span class="badge badge-pill badge-secondary mb-3">Follows you</span>
                @endif
            @endif
        <div class="text-center">
            @include('user_follow.follow_button', ['user' => $user])
        </div>
    </div>
    <div class="container">
        <ul class="nav nav-tabs nav-fill mt-3" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">{{ $count_posts }} Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="books-tab" data-toggle="tab" href="#books" role="tab" aria-controls="books" aria-selected="false">{{ $count_have }} Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="wants-tab" data-toggle="tab" href="#wants" role="tab" aria-controls="wants" aria-selected="false">{{ $count_want }} Wants</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="follower-tab" data-toggle="tab" href="#followers" role="tab" aria-controls="follower" aria-selected="false">{!! $count_followers !!} Followers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="following-tab" data-toggle="tab" href="#followings" role="tab" aria-controls="following" aria-selected="false">{!! $count_followings !!} Following</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="likes-tab" data-toggle="tab" href="#likes" role="tab" aria-controls="likes" aria-selected="false">num Likes</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                @if (count($posts) > 0)
                    @include('posts.posts', ['posts' => $posts])
                @endif
            </div>
            <div class="tab-pane fade" id="books" role="books" aria-labelledby="books-tab">
                @include('books.books', ['books' => $books])
                {!! $books->render() !!}
            </div>
            <div class="tab-pane fade" id="wants" role="wants" aria-labelledby="wants-tab">
                @include('books.books', ['books' => $books])
                {!! $books->render() !!}
            </div>
            <div class="tab-pane fade" id="followers" role="followers" aria-labelledby="followers-tab">
                @include('users.followers', ['followers' => $followers])
                {!! $followers->render() !!}
            </div>
            <div class="tab-pane fade" id="followings" role="following" aria-labelledby="following-tab">
                @include('users.followings', ['followings' => $followings])
                {!! $followings->render() !!}
            </div>
            <div class="tab-pane fade" id="likes" role="likes" aria-labelledby="likes-tab">
                
            </div>
        </div>
@endsection

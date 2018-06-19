@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="text-center">
            <img src="/images/user.jpg" alt="" class="rounded-circle user_photo">
        </div>
        <div class="text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="text-center">
            <div class="lead">WANT</div>
            <div id="want_count" class="status-value">
                {{ $count_want }}
            </div>
            <div class="lead">HAVE</div>
            <div id="have_count" class="status-value">
                21
            </div>
            <div class="lead">
                Followers
            </div>
            <div id="followers" class="status-value">
                211
            </div>
            <div class="lead">
                Following
            </div>
            <div id="following" class="status-value">
                162
            </div>
        </div>
    </div>
    @include('books.books', ['books' => $books])
    {!! $books->render() !!}
@endsection

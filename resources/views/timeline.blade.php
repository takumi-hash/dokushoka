@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="container">
        @if (count($posts) > 0)
            @include('posts.posts', ['posts' => $posts])
        @endif
    </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>please log in</h1>
                {!! link_to_route('register', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="text-center">
            <img src="{{-- Gravatar::src($user->email, 100) . '&d=mm' --}}" alt="" class="rounded-circle">
        </div>
        <div class="text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="text-center">
            <ul>
                <li>
                    <div class="lead">WANT</div>
                    <div id="want_count" class="status-value">
                        {{ $count_want }}
                    </div>
                </li>
                <li>
                    <div class="lead">HAVE</div>
                    <div id="have_count" class="status-value">
                        xxx
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @include('books.books', ['books' => $books])
    {!! $books->render() !!}
@endsection
@extends('layouts.app')

@section('cover')
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">素敵な本と出会う場所</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    @if (!Auth::check())
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">ドクショカを始める</a>
    @endif
        </div>
    </div>
@endsection
{{--
@section('content')
    @include('items.items')
    {!! $items->render() !!}
@endsection
--}}
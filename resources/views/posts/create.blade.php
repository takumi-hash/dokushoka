@extends('layouts.app')

@section('content')
<div class="bg-dark pb-3 pt-2" id="form-bg">
    <div class="container">
        <div class="text-white-50 my-3">『{{ $book->title }}』（{{ $book->publisher }}）／ {{ $book->author }}</div>
        @if (Auth::id() == $user->id)
        {!! Form::open(['route' => 'posts.store']) !!}
            <div class="form-group p-2" id="review-form-group">
                {!! Form::hidden('book_id', $book->id) !!}
                {!! Form::textarea('title', old('title'), ['class' => 'form-control pt-3 font-weight-bold', 'id'=>'form-title', 'placeholder'=>'Title','rows' => '1']) !!}
                <hr>
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'Markdown記法を使えます。']) !!}
                {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
            </div>
            {!! Form::close() !!}
        @endif
    </div>
</div>
@endsection
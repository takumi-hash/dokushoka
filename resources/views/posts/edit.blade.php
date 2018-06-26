@extends('layouts.app')

@section('content')
<?php $book = $post->book; ?>
<div class="bg-dark py-5" id="form-bg">
    <div class="container">
        @if (Auth::id() == $user->id)
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
            <div class="form-group p-2" id="review-form-group">
                {{Form::hidden('book_id', $post->book_id)}}
                {!! Form::textarea('title', $post->title, ['class' => 'form-control pt-3 font-weight-bold', 'id'=>'form-title', 'placeholder'=>'Title','rows' => '1']) !!}
                <hr>
                {!! Form::textarea('content', $post->content, ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'Markdown記法を使えます。']) !!}
                You're writing on {{ $book->title }}.
                {!! Form::submit('更新する', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
            </div>
            {!! Form::close() !!}
        @endif
    </div>
</div>
@endsection

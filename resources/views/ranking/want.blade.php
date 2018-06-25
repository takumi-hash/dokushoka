@extends('layouts.app')

@section('content')
<div class="container">
        @foreach ($books as $key => $book)
        <div class="row">
            <div class="col-md-4 col-sm-6 d-flex align-items-center p-3 py-5">
                <div class="col-6">
                    @if (isset($book->count))
                        <p class="h3 font-weight-light">{{ $key+1 }}位<br>{{ $book->count }} Points</p>
                    @endif
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
                    <!--div class="text-muted">
                        <small class="">{{ $book->publisher }} / {{ $book->isbn }}</small>
                    </div-->
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
                    <h5>Discription</h5>
                    <p class="text-justify">{{ $book->caption }}</p>
                </div>
            </div>
        </div>
        @endforeach
</div>
@endsection
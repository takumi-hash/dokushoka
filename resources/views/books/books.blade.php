@if ($books)
    <div class="row">
        @foreach ($books as $book)
            <div class="card col-md-2 col-sm-4 bg-dark">
                <img class="card-img-top" src="{{ $book->image_url }}" alt="{{ $book->title }}">
                <div class="card-body text-light">
                    @if ($book->id)
                    <p class="card-title"><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></p>
                    @else
                    <p class="card-text">{{ $book->title }}</p>
                    @endif
                    <p class="card-text text-white-50">{{ $book->author }}</p>
                    <hr>
                    <small class="text-muted">{{ $book->publisher }}</small>
                    <small class="text-muted">{{ $book->isbn }}</small>
                </div>
                <div class="card-body">
                    <a href="{{ $book->url }}" class="btn btn-outline-primary">Buy</a>
                    @if (Auth::check())
                        @include('books.want_button', ['book' => $book])
                    @endif
                    <a href="#" class="btn btn-outline-info">Have</a>
                </div>
            </div>
        @endforeach
    </div>
@endif

@if ($books)
    <div class="row">
        @foreach ($books as $book)
            <div class="card col-lg-2 bg-dark">
                <img class="card-img-top" src="{{ $book->image_url }}" alt="{{ $book->title }}">
                <div class="card-body text-light">
                    @if ($book->id)
                    <p class="card-title"><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></p>
                    @else
                    <p class="card-text">{{ $book->title }}</p>
                    @endif
                    <hr>
                    <p class="card-text">{{ $book->publisher }}</p>
                    <p class="card-text">{{ $book->isbn }}</p>
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


@if ($books)
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4 col-sm-4 bg-light d-flex align-items-center p-1">
                <div class="col-6">
                    <img class="book-img" src="{{ $book->image_url }}" alt="{{ $book->title }}">
                </div>
                <div class="col-6">
                    <div class="text-dark">
                        @if ($book->id)
                        <p class=""><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></p>
                        @else
                        <p class="">{{ $book->title }}</p>
                        @endif
                        <p class="text-white-50">{{ $book->author }}</p>
                        <hr>
                        <small class="text-muted">{{ $book->publisher }}</small>
                        <small class="text-muted">{{ $book->isbn }}</small>
                    </div>
                    <div class="">
                        <a href="{{ $book->url }}" class="btn btn-outline-primary">Buy</a>
                        @if (Auth::check())
                            @include('books.want_button', ['book' => $book])
                        @endif
                        <a href="#" class="btn btn-outline-info">Have</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

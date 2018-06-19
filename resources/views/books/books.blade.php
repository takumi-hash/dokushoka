@if ($books)
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4 col-sm-6 bg-white d-flex align-items-center p-3 py-5">
                <div class="col-6">
                    <img class="book-img rounded" src="{{ $book->image_url }}" alt="{{ $book->title }}">
                </div>
                <div class="col-6">
                    <div class="text-dark">
                        @if ($book->id)
                        <h5 class=""><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></h5>
                        @else
                        <h5 class="font-weight-normal">{{ $book->title }}</h5>
                        @endif
                        <p class="author">{{ $book->author }}</p>
                        <hr>
                    </div>
                    <!--div class="text-muted">
                        <small class="">{{ $book->publisher }} / {{ $book->isbn }}</small>
                    </div-->
                    <div class="">
                        @if (Auth::check())
                            @include('books.want_button', ['book' => $book])
                            @include('books.have_button', ['book' => $book])
                        @endif
                        <a href="{{ $book->url }}" class="btn btn-block btn-outline-primary">Buy</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

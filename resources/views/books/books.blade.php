@if ($books)
    <div class="row">
        @foreach ($books as $key => $book)
            <div class="col-md-3 col-sm-6 d-flex align-items-center py-5">
                <div class="col-6">
                @if (isset($book->count))
                    <p class="text-center h4">{{ $key+1 }}位: {{ $book->count}} Points</p>
                @endif
                    <img class="book-img rounded" src="{{ $book->image_url }}" alt="{{ $book->title }}">
                </div>
                <div class="col-6">
                    <div class="text-dark">
                        @if ($book->id)
                        <h6 class=""><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></h5>
                        @else
                        <h6 class="font-weight-normal">{{ $book->title }}</h6>
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
        @endforeach
    </div>
@endif

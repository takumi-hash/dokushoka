@if ($books)
<div class="row">
            @foreach ($books as $book)
            <div class="card col-lg-2">
                <img class="card-img-top" src="{{ $book->image_url }}" alt="{{ $book->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text">{{ $book->author }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $book->publisher }}</li>
                    <li class="list-group-item">{{ $book->isbn }}</li>
                </ul>
                <div class="card-body">
                    <a href="{{ $book->url }}" class="btn btn-outline-primary">Buy</a>
                    <a href="#" class="btn btn-outline-success">Want</a>
                    <a href="#" class="btn btn-outline-info">Have</a>
                </div>
            </div>
            @endforeach
</div>
@endif

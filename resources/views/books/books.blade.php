@if ($items)
    <div class="row">
        @foreach ($items as $item)
            <div class="item">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-heading text-center">
                            <img src="{{ $book->image_url }}" alt="">
                        </div>
                        <div class="panel-body">
                            <p class=""><a href="#">{{ $book->title }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
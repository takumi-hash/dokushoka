@foreach($favorites as $favorite)
    @include('posts.posts', ['posts' => $favorites])
@endforeach
<div class="">
@foreach ($posts as $post)
    <?php $user = $post->user; ?>
    <div class="card my-3">
        <div class="card-body p-4">
            <div class="row py-4">
                <div class="col-md-1 offset-md-1 col-4">
                    <img class="rounded-circle align-middle" src="/images/user{{ $user->id }}.jpg" alt="">
                </div>
                <div class="col-md-7 col-6">
                    <span class="">{!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}</span>
                    <span class="text-muted ml-3">{{ $post->created_at }}</span>
                </div>
                <div class="col-md-1 offset-md-1 col-1">
                    <div class="btn-group" role="group" aria-label="favorites">
                        @if(Auth::check())
                            @include('posts.favorite_button', ['post' => $post])
                        @endif
                        <div class="text-warning mt-2">{{ $post->count_favorites() }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h3 class="text-dark py-3 post-title">{!! nl2br(e($post->title)) !!}</h3>
                    <hr>
                    <p class="post-content">{!! $post->parsed_content() !!}</p>
                </div>
            </div>
            {!! link_to_route('posts.edit', 'このメッセージを編集', ['id' => $post->id]) !!}
            <div class="row">
                <div class="col-1 offset-10">
                    @if (Auth::id() == $post->user_id)
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>

        </div>
    </div>
@endforeach
</div>
{!! $posts->render() !!}

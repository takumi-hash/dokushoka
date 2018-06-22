<div class="">
@foreach ($posts as $post)
    <?php $user = $post->user; ?>
    <div class="card my-3">
        <div class="card-body p-5">
            <div class="row">
                <div class="col-1">
                    <img class="rounded-circle align-middle" src="/images/user{{ $user->id }}.jpg" alt="">
                </div>
                <div class="col-10">
                    <span class="">{!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}</span>
                    <span class="text-muted ml-3">{{ $post->created_at }}</span>
                    <h3 class="text-dark py-3 post-title">{!! nl2br(e($post->title)) !!}</h3>
                    <hr>
                    <p class="post-content">{!! nl2br(e($post->content)) !!}</p>
                </div>
                <div class="col-1">
                    @if(Auth::check())
                        @include('posts.favorite_button', ['post' => $post])
                    @endif
                </div>
                <div class="col-1 offset-11">
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
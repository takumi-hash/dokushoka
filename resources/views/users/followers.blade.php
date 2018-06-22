<div class="">
@foreach ($followers as $follower)
    <div class="card my-3">
        <div class="card-body p-5">
            <div class="row">
                <div class="col-1">
                    <img class="rounded-circle align-middle" src="/images/user{{ $follower->id }}.jpg" alt="">
                </div>
                <div class="col-11">
                    <p class="">{!! link_to_route('users.show', $follower->name, ['id' => $follower->id]) !!}</p>
                    <p class="">{!! $count_followers !!} Followers, {!! $count_followings !!} Followings</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

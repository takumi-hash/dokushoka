<div class="">
@foreach ($followings as $following)
    <div class="card my-3">
        <div class="card-body p-5">
            <div class="row">
                <div class="col-1">
                    <img class="rounded-circle align-middle" src="/images/user{{ $following->id }}.jpg" alt="">
                </div>
                <div class="col-11">
                    <p class="">{!! link_to_route('users.show', $following->name, ['id' => $following->id]) !!}</p>
                    <p class="">{!! $count_followings !!} followings, {!! $count_followings !!} Followings</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

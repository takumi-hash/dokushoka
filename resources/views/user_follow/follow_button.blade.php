@if (Auth::id() != $user->id)
    @if (Auth::user()->is_following($user->id))
        {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
            {!! Form::button('<span id="followed"><i class="fas fa-check"></i> Following</span><span id="unfollow"><i class="fas fa-minus-circle"></i> Unfollow</span>', ['type' => 'submit', 'class' => 'btn btn-success', 'id'=>'unfollow-button'] )  !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
            {!! Form::button('<span id="follow"><i class="fas fa-plus mr-3"></i>Follow</span>', ['type' => 'submit', 'class' => 'btn btn-primary', 'id'=>'follow-button'] )  !!}
        {!! Form::close() !!}
    @endif
@endif
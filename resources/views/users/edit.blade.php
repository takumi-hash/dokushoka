@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Profile</h2>
            <p>プロフィールを編集できます。</p>
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'ユーザ名') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::text('email', $user->mail, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('bio', '自己紹介') !!}
                    {!! Form::text('bio', $user->bio, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('更新', ['class' => 'btn btn-block btn-primary']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

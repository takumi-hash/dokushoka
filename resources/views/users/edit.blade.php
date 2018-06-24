@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profile</h2>
    <p>プロフィールを編集できます。</p>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Password: {{ $user->password }}</p>
</div>
@endsection

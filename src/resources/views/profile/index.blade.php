@extends('layouts.app')

@section('content')
<div class="body-container">
    <h2>マイページ</h2>
    <div class="profile-container">
        <div class="profile-form">
            <img src="{{ asset('storage/' . $profile->avatar_path) }}" alt="プロフィール画像" class="profile-image">
        </div>
        <div class="profile-form">
            <label for="name">名前:</label>{{ $profile->user->name }}
        </div>
        <div class="profile-form">
            <label for="bio">自己紹介:</label>{{ $profile->bio }}
        </div>
        <div>
            <a href="{{ route('mahjong.profile.create') }}" class="btn btn-primary">プロフィール編集</a>
        </div>
    </div>
</div>
@endsection
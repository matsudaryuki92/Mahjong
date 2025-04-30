@extends('layouts.app')

@section('content')
<div class="body-container">
    <h2>プロフィール設定画面</h2>
    <div class="profile-container">
        <form action="{{ route('mahjong.profile.update') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="profile-form">
                <label for="name">名前:</label>
                <input type="text" name="name" placeholder="名前" value="{{ old('name', $user->name) }}" id="name">
            <div class="profile-form">
                <label for="avatar_path">プロフィール画像</label>
                <input type="file" name="avatar_path" placeholder="画像設定" value="" id="avatar_path">
            </div>
            <div class="profile-form">
                <label for="bio">自己紹介:</label>
                <textarea name="bio" placeholder="自己紹介" id="bio"></textarea>
            </div>
            <button type="submit">更新</button>
        </form>
    </div>
</div>
@endsection
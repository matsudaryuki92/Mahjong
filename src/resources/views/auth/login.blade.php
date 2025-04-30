@extends('layouts.app')

@section('content')
    <div class="body-container">
        <div class="login-container">
            <h2>ログイン</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="email" name="email" placeholder="メールアドレス">
                <input type="password" name="password" placeholder="パスワード">
                <button type="submit">ログイン</button>
            </form>
        </div>
@endsection
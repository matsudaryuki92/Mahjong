@extends('layouts.app')

@section('content')
    <div class="body-container">
        <div class="register-container">
            <h2>会員登録</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" placeholder="名前">
                <input type="email" name="email" placeholder="メールアドレス">
                <input type="password" name="password" placeholder="パスワード">
                <input type="password" name="password_confirmation" placeholder="パスワード確認">
                <button type="submit">会員登録</button>
            </form>
        </div>
    </div>
@endsection
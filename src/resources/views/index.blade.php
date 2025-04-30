<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <title>雀荘マップ</title>
</head>

<body>
    <div class="header">
        <h1>雀荘マップ</h1>
        <div class="header-auth">
            <form action="/logout" method="POST">
                @csrf
                <button class="auth-button">ログアウト</button>
            </form>
            <a href="/register" class="auth-button">会員登録</a>
            <a href="/login" class="auth-button">ログイン</a>
            @if(Auth::check())
            <a href="{{ route('mahjong.profile.index') }}" class="auth-button">マイページ</a>
            @endif
        </div>
    </div>
    <div class="container">
        <div id="map" class="mahjong-map"></div>
        <div class="search-form__button">
            <form action="{{ route('mahjong.search') }}" method="GET" style="display: flex; gap: 10px;">
                <input type="text" class="search-form__input" />
                <button class="search-button" type="submit">雀荘を検索</button>
                <button class="reset-button" type="button" onclick="location.href='{{ route('mahjong.index') }}'">
                    リセット
                </button>
            </form>
        </div>
        <div id="store-info" style="margin-top: 20px;"></div>
    </div>

    <div></div>

    <div id="store-modal" class="modal">
        <div class="modal__content">
            <span class="modal__close">&times;</span>
            <div id="modal-body">
                @if(isset($store))
                <script>
                    //この処理は、Laravelで取得した店舗情報をJSでも使えるように、window.storeLocationというグローバル変数に代入しています。
                    window.storeLocation = {
                        id: {{$store->id}},
                        lat: {{$store->latitude}},
                        lng: {{$store->longitude}},
                        name: "{{ $store->name }}",
                        address: "{{ $store->address }}",
                        phone: "{{ $store->phone }}",
                        url: "{{ $store->url }}",
                        opening_hours: "{{ $store->opening_hours }}",
                        closing_hours: "{{ $store->closing_hours }}",
                        holiday: "{{ $store->holiday }}"
                    };
                </script>
                @endif
            </div>
        </div>
    </div>

    <script src="{{ asset('js/map.js') }}"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqsMakWYL1fg2LCGmvIWD-ok_A54aEWJ4&callback=initMap">
    </script>
</body>

</html>
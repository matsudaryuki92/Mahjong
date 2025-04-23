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
    </div>
    <div class="container">

        <div id="map" class="mahjong-map"></div>

        <form action="{{ route('mahjong.search') }}" method="GET" class="search-form">
            <div class="search-form">
                <div class="search-form__button">
                    <input type="text" name="name" class="search-button" placeholder="雀荘名を入力" />
                    <button class="search-button" type="submit">雀荘を検索</button>
                </div>
            </div>
        </form>
        <a href="{{ route('mahjong.index')}}">
            <button class="search-button" type="reset">リセット</button>
        </a>

        <div id="store-info" style="margin-top: 20px;"></div>

    </div>

    <div id="store-modal" class="modal">
        <div class="modal__content">
            <span class="modal__close">&times;</span>
                <div id="modal-body">
                @if(isset($store))
                    <script>
                        //この処理は、Laravelで取得した店舗情報をJSでも使えるように、window.storeLocationというグローバル変数に代入しています。
                        window.storeLocation = {
                            id: {{ $store->id }},
                            lat: {{ $store->latitude }},
                            lng: {{ $store->longitude }},
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

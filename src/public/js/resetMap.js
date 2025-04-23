function resetMap() {
    map.setCenter({ lat: 35.6812, lng: 139.7671 });  // 東京駅
    map.setZoom(14);  // ズームレベルを元に戻す
}

// 現在地を取得
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        (position) => {
            const userPos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };

            // マップの中心を現在地に移動
            map.setCenter(userPos);

            // 現在地にマーカーを表示
            new google.maps.Marker({
                position: userPos,
                map: map,
                title: "現在地",
            });
        },
        () => {
            alert("位置情報の取得に失敗しました。ブラウザの許可を確認してください。");
        }
    );
}
else {
    alert("このブラウザでは位置情報が利用できません。");
}
// Maps JavaScript APIのcallbackで呼ばれるように公開
window.resetMap = resetMap;
function initMap() {
  if (!navigator.geolocation) {
    alert("このブラウザでは位置情報が利用できません。");
    return;
  }

  navigator.geolocation.getCurrentPosition(
    position => {
      const userPos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      };

      const map = new google.maps.Map(document.getElementById("map"), {
        center: userPos,
        zoom: 14,
      });

      const directionsService = new google.maps.DirectionsService();
      const directionsRenderer = new google.maps.DirectionsRenderer();
      directionsRenderer.setMap(map);

      if (window.storeLocation && window.storeLocation.id) {
        const dest = {
          lat: window.storeLocation.lat,
          lng: window.storeLocation.lng
        };

        directionsService.route({
          origin: userPos,
          destination: dest,
          travelMode: google.maps.TravelMode.WALKING
        }, (result, status) => {
          if (status === google.maps.DirectionsStatus.OK) {
            directionsRenderer.setDirections(result);

            const duration = result.routes[0].legs[0].duration.text;
            new google.maps.InfoWindow({
              content: `<div>所要時間：${duration}</div>`,
              position: dest
            }).open(map);
          } else {
            alert("経路の取得に失敗しました。");
          }
        });

        const storeMarker = new google.maps.Marker({
          position: dest,
          map,
          title: window.storeLocation.name,
        });

        storeMarker.addListener("click", () => {
          //dbから取得した店舗情報を表示するためのモーダルを作成
          fetch(`/mahjong/store-info/${window.storeLocation.id}`)
            //resはfetchのレスポンスオブジェクト定義され、サーバーから返されたレスポンス情報を含む
            .then(res => {
              if (!res.ok) throw new Error(`ステータス ${res.status}`);
              return res.json();
            })
            //dataはres.json()で変換されたサーバーからのJSONデータで、詳細情報を格納している
            .then(data => {
              const modalBody = document.getElementById("modal-body");
              modalBody.innerHTML = `
                <h2>${data.name}</h2>
                <p>住所: ${data.address}</p>
                <p>電話: ${data.phone}</p>
                <p>URL: <a href="${data.url}" target="_blank">${data.url}</a></p>
                <p>営業時間: ${data.opening_hours}〜${data.closing_hours}</p>
                <p>定休日: ${data.holiday}</p>
              `;
              document.getElementById("store-modal").classList.add("active");
            })
            .catch(err => {
              console.error(err);
              alert("店舗情報の取得に失敗しました");
            });
        });
      }
    },
    () => {
      alert("位置情報の取得に失敗しました。ブラウザの許可を確認してください。");
    }
  );
}

document.addEventListener('DOMContentLoaded', () => {
  document.getElementById("store-modal").addEventListener("click", (e) => {
    if (e.target.id === "store-modal") {
      e.target.classList.remove("active");
    }
  });
});

window.initMap = initMap;

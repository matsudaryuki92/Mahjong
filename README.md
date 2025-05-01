# Mahjong

<h2>プロジェクト内容</h2>

<h2>機能一覧</h2>
<h3>（未）認証ユーザー</h3>

<h3>（済）認証ユーザー</h3>

<h2>環境構築</h2>
<h3>Dockerビルド</h3>
1. git clone git@github.com:matsudaryuki92/Mahjong.git
2. cd Mahjong
3. docker-compose up -d --build
* MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

<h3>Laravel環境構築</h3>
1. srcディレクトリ内で .env.example をコピーして .env を作成
2. cd src
3. docker-compose exec php bash
4. composer install
5. php artisan key:generate
6. php artisan migrate
7. php artisan db:seed

<h2>使用技術</h2>

<h2>使用ライブラリ</h2>

<h3>BE</h3>

<h3>FE</h3>

<h3>ローカル開発用</h3>

<h2>URL</h2>
* 開発環境:http://localhost
* phpMyAdmin:http://localhost:8080

<h2>ER図</h2>
![ER図](https://app.diagrams.net/#G1F711yuGuEFAOBA7Wh6BLvozM68f9k5M5#{"pageId"%3A"R2lEEEUBdFMjLlhIrx00"})


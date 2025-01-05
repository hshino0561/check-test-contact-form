# アプリケーション名
　お問い合わせフォーム
## 環境構築
　Dockerビルド
　　1. git clone git@github.com:hshino0561/check-test-contact-form.git
　　2. docker-compose up -d --build

　※各種コンテナが起動しない場合は、PCの環境に合わせてdocker-compose.ymlファイルを編集してください。

　Laravel環境構築
　　1. docker-compose exec php bash
　　2. composer install
　　3. .env.exampleファイルから.envを作成し、環境変数を変更
　　4. php artisan key:generate
　　5. php artisan migrate
　　6. php artisan db:seed

## 使用技術(実行環境)
　　・PHP 8.1.1
　　・Laravel 8.83.29
　　・MySQL 8.0.26
　　・Nginx 1.21.1
　　・Fortify 1.19
　　・Bootstrap

## ER図
　　・ER.drawio.svg

## URL
　　・開発環境：http://localhost/
　　・phpMyAdmin：http://localhost:8080

## 未実装内容
　　※全体的に実装が間に合わず中途半端な状態です。
　　・レイアウト調整
　　・フォームリクエストを使用したバリデーションチェック
　　・管理画面：モーダル機能
　　・管理画面：エクスポート機能

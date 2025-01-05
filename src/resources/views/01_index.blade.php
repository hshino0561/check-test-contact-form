<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/00_sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/01_index.css') }}" />
</head>
<body>
    <header class="header">
        <h1>FashionablyLate</h1>
    </header>
    <main class="main-container">
        <h2>Contact</h2>
        <form  action="/confirm" method="POST" class="contact-form">
          @csrf
            <div class="form-group">
                <label for="last-name">お名前 <span class="required">※</span></label>
                <div class="name-fields">
                    <input type="text" id="last-name" name="last_name" placeholder="例: 山田" value="{{ $_GET['last_name'] ?? '' }}" required>
                    <input type="text" id="first-name" name="first_name" placeholder="例: 太郎" value="{{ $_GET['first_name'] ?? '' }}" required>
                </div>
            </div>
            <div class="form-group">
                <label>性別 <span class="required">※</span></label>
                <div class="gender-fields">
                    <label><input type="radio" name="gender" value="1" required {{ request()->get('gender') == '男性' ? 'checked' : '' }} required checked> 男性</label>
                    <label><input type="radio" name="gender" value="2" required {{ request()->get('gender') == '女性' ? 'checked' : '' }} required> 女性</label>
                    <label><input type="radio" name="gender" value="3" required {{ request()->get('gender') == 'その他' ? 'checked' : '' }} required> その他</label>
                </div>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス <span class="required">※</span></label>
                <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ $_GET['email'] ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="tel">電話番号 <span class="required">※</span></label>
                <div class="tel-fields">
                    <input type="text" name="tel_part1" placeholder="080" value="{{ $_GET['tel_part1'] ?? '' }}" required>
                    <input type="text" name="tel_part2" placeholder="1234" value="{{ $_GET['tel_part2'] ?? '' }}" required>
                    <input type="text" name="tel_part3" placeholder="5678" value="{{ $_GET['tel_part3'] ?? '' }}" required>
                    <input type="hidden" name="tel" placeholder="5678" value="{{ $_GET['tel'] ?? '' }}" >
                </div>
            </div>
            <div class="form-group">
                <label for="address">住所 <span class="required">※</span></label>
                <input type="text" id="address" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ $_GET['address'] ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="building">建物名</label>
                <input type="text" id="building" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ $_GET['building'] ?? '' }}" >
            </div>
            <div class="form-group">
                <label for="category-type">お問い合わせの種類 <span class="required">※</span></label>
                <select id="category-type" name="categry_type" required>
                    <option value="" disabled {{ request()->get('categry_type') ? '' : 'selected' }}>選択してください</option>
                    <option name="categry_type" value="1" {{ request()->get('categry_type') == '商品のお届けについて' ? 'selected' : '' }}>商品のお届けについて</option>
                    <option name="categry_type" value="2" {{ request()->get('categry_type') == '商品の交換について' ? 'selected' : '' }}>商品の交換について</option>
                    <option name="categry_type" value="3" {{ request()->get('categry_type') == '商品トラブル' ? 'selected' : '' }}>商品トラブル</option>
                    <option name="categry_type" value="4" {{ request()->get('categry_type') == 'ショップへのお問い合わせ' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                    <option name="categry_type" value="5" {{ request()->get('categry_type') == 'その他' ? 'selected' : '' }}>その他</option>
                </select>
            </div>
            <div class="form-group">
                <label for="detail">お問い合わせ内容 <span class="required">※</span></label>
                <textarea id="detail" name="detail" placeholder="お問い合わせ内容をご記載ください" required>{{ $_GET['detail'] ?? '' }}</textarea>
            </div>
            <button type="submit" class="submit-button">確認画面</button>
        </form>
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
    <link rel="stylesheet" href="{{ asset('css/00_sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/06_login.css') }}" />
</head>
<body>
    <header class="header">
        <h1>FashionablyLate</h1>
        <a href="/register" class="register-link">register</a>
    </header>
    <main class="main-container">
        <h2>Login</h2>
        <form action="/login" method="POST" class="login-form">
           @csrf
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" placeholder="例: test@example.com" required>

            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" placeholder="例: coachtech1106" required>

            <button type="submit" class="submit-button">ログイン</button>
        </form>
    </main>
</body>
</html>

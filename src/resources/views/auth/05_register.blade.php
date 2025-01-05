<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録ページ</title>
    <link rel="stylesheet" href="{{ asset('css/00_sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/05_register.css') }}" />
</head>
<body>
    <header class="header">
        <h1>FashionablyLate</h1>
        <a href="/login" class="login-link">login</a>
    </header>
    <main class="main-container">
        <h2>Register</h2>
        <form action="/register" method="POST" class="register-form">
           @csrf
            <label for="name">お名前</label>
            <input type="text" id="name" name="name" placeholder="例: 山田　太郎" value="{{ old('name') }}" required>

            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" required>

            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" placeholder="例: coachtech1106" required>

            <button type="submit" class="submit-button">登録</button>
        </form>
    </main>
</body>
</html>

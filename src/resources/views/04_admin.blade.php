<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/00_sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/04_admin.css') }}" />
</head>
<body>
    <header class="header">
        <h1>FashionablyLate</h1>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <a href="#" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            logout
        </a>
    </header>
    <main class="main-container">
        <h2>Admin</h2>
        <form action="/admin" method="GET" class="search-form">
          @csrf
          <input type="text" name="search_key" placeholder="名前やメールアドレスを入力してください">
            <select name="gender">
                <option value="">性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
            <select name="category">
                <option value="">お問い合わせの種類</option>
                <option value="1">商品のお届けについて</option>
                <option value="2">商品の交換について</option>
                <option value="3">商品トラブル</option>
                <option value="4">ショップへのお問い合わせ</option>
                <option value="5">その他</option>
            </select>
            <input type="date" name="date">
            <button type="submit" class="search-button">検索</button>
            <button type="reset" class="reset-button" onclick="window.location.href='/admin'" >リセット</button> 
        </form>
        <button class="export-button">エクスポート</button>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name .'　'. $contact->first_name }}</td>
                    <?php
                        $gender_text = '';
                        switch ($contact['gender']) {
                            case 1:
                                $gender_text = '男性';
                                break;
                            case 2:
                                $gender_text = '女性';
                                break;
                            case 3:
                                $gender_text = 'その他';
                                break;
                            default:
                                $gender_text = '未指定';
                                break;
                        }
                    ?>
                    <td>{{ $gender_text }}</td>
                    <td>{{ $contact->email }}</td>
                    <?php
                        $categry_type_text = '';
                        switch ($contact['categry_id']) {
                            case 1:
                                $categry_type_text = '商品のお届けについて';
                                break;
                            case 2:
                                $categry_type_text = '商品の交換について';
                                break;
                            case 3:
                                $categry_type_text = '商品トラブル';
                                break;
                            case 4:
                                $categry_type_text = 'ショップへのお問い合わせ';
                                break;
                            case 5:
                                $categry_type_text = 'その他';
                                break;
                            default:
                                $categry_type_text = '未指定';
                                break;
                        }
                    ?>
                    <td>{{ $categry_type_text }}</td>
                    <!-- モーダルをトリガーするボタン -->
                    <form action="/contacts/{{ $contact->id }}" method="GET">
                        @csrf
                        <td><button type="submit" class="details-button">詳細</button></td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
              {{ $contacts->links('vendor.pagination.custom') }}
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </main>
</body>
</html>

<!-- <?php print_r($contact) ?> -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/00_sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/02_confirm.css') }}" />
</head>
<body>
    <header class="header">
        <h1>FashionablyLate</h1>
    </header>
    <main class="main-container">
        <h2>Confirm</h2>
      <form class="form" action="/contacts" method="post">
        @csrf
        <table class="confirm-table">
            <tr>
                <th>お名前</th>
                <td>
                    <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly class="inherit-font" />
                    <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly class="inherit-font" />
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
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
                    <input type="text" name="gender" value="{{ $gender_text }}" readonly class="inherit-font" />
                    <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly class="inherit-font" />
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    <input type="text" name="email" value="{{ $contact['email'] }}" readonly class="inherit-font" />
                </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>
                    <input type="text" name="tel" value="{{ $contact['tel'] }}" readonly class="inherit-font" />
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>
                    <input type="text" name="address" value="{{ $contact['address'] }}" readonly class="inherit-font" />
                </td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>
                    <input type="text" name="building" value="{{ $contact['building'] }}" readonly class="inherit-font" />
                </td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>
                    <?php
                        $categry_type_text = '';
                        switch ($contact['categry_type']) {
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
                    <input type="text" name="categry_id" id="categry_id" value="{{ $categry_type_text }}" readonly class="inherit-font" />
                    <input type="hidden" name="categry_id" id="categry_id" value="{{ $contact['categry_type'] }}" readonly class="inherit-font" />
                </td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>
                    <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly class="inherit-font" />
                </td>
            </tr>
        </table>
        <div class="button-container">
            <form action="submit.php" method="POST" style="display: inline;">
                <button type="submit" class="submit-button">送信</button>
            </form>

            <form action="/" method="GET" style="display: inline;">
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                <input type="hidden" name="tel_part1" value="{{ $contact['tel_part1'] }}" />
                <input type="hidden" name="tel_part2" value="{{ $contact['tel_part2'] }}" />
                <input type="hidden" name="tel_part3" value="{{ $contact['tel_part3'] }}" />
                <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                <input type="hidden" name="categry_type" value="{{ $contact['categry_type'] }}" />
                <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
              <button type="submit" class="modify-button">修正</button>
            </form>
        </div>
      </form>
    </main>
</body>
</html>

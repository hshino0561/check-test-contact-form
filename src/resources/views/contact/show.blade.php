<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>詳細情報</title>
</head>
<body>
    <details>
        <summary>詳細</summary>
        <div class="modal-content">
            <h5 class="modal-title">詳細情報</h5>
            <p><strong>名前:</strong> {{ $contact->last_name }} {{ $contact->first_name }}</p>
            <p><strong>性別:</strong> {{ $contact->gender == 1 ? '男性' : '女性' }}</p>
            <p><strong>メールアドレス:</strong> {{ $contact->email }}</p>
            <p><strong>お問い合わせの種類:</strong> 
                @switch($contact->categry_id)
                    @case(1)
                        商品のお届けについて
                        @break
                    @case(2)
                        商品の交換について
                        @break
                    @case(3)
                        商品トラブル
                        @break
                    @case(4)
                        ショップへのお問い合わせ
                        @break
                    @case(5)
                        その他
                        @break
                    @default
                        未指定
                @endswitch
            </p>
            <p><strong>お問い合わせ内容:</strong> {{ $contact->detail }}</p>
        </div>
    </details>
</body>
</html>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/contact/confirm.css') }}">
</head>

<body>
    <header class="header">
        <h1 class="site-title">FashionablyLate</h1>
    </header>

    <div class="container">
        <h2 class="page-title">Confirm</h2>
        <table class="form-table">
            <tr>
                <th>お名前</th>
                <td>
                    <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly>
                    <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly>
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    <input type="text" name="gender" value="{{ $contact['gender'] === 1 ? '男性' : ($contact['gender'] === 2 ? '女性' : 'その他') }}" readonly>
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    <input type="email" name="email" value="{{ $contact['email'] }}" readonly>
                </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>
                    <input type="text" name="tel" value="{{ $contact['tel'] }}" readonly>
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>
                    <input type="text" name="address" value="{{ $contact['address'] }}" readonly>
                </td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>
                    <input type="text" name="building" value="{{ $contact['building'] }}" readonly>
                </td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>
                    <input type="text" name="category_id" value="{{ ['商品のお届けについて', '商品の交換について', '商品トラブル', 'ショップへのお問い合わせ', 'その他'][$contact['category_id'] - 1] }}" readonly>
                </td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>
                    <textarea name="detail" readonly>{{ $contact['detail'] }}</textarea>
                </td>
            </tr>
        </table>

        <div class="button-group">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-submit">送信</button>
            </form>
            <form action="{{ route('contact.index') }}" method="GET">
                <button type="submit" class="btn btn-edit">修正</button>
            </form>
        </div>
    </div>
</body>

</html>
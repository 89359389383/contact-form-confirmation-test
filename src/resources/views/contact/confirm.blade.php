<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/confirm/index.css') }}">
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            color: #666;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            /* ヘッダー内の文字や要素を中央揃えにする */
            padding: 20px 0;
            /* 上下に20ピクセルの余白を作る */
            border-bottom: 1px solid #eee;
            /* ヘッダーの下に薄い線（ボーダー）を作る */
            display: grid;
            align-items: center;
            background: white;
        }

        .site-title {
            color: #987;
            font-weight: normal;
            font-size: 30px;
            font-family: "Times New Roman", Times, serif;
        }

        .page-title {
            color: #987;
            font-weight: normal;
            font-size: 30px;
            font-family: "Times New Roman", Times, serif;
            text-align: center
        }

        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .form-table th {
            width: 200px;
            background-color: #b5a397;
            color: white;
            padding: 15px 20px;
            text-align: left;
            font-weight: normal;
            border-bottom: 2px solid white;
        }

        .form-table td {
            padding: 15px 20px;
            background-color: #f8f8f8;
            border-bottom: 2px solid white;
        }

        .button-group {
            text-align: center;
            margin-top: 40px;
            display: flex;
            /* 横並びに配置 */
            justify-content: center;
            /* コンテンツを中央揃え */
            gap: 16px;
            /* ボタン間のスペースを調整 */
        }

        .inline-form {
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 40px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-submit {
            background-color: #8c7b6e;
            color: white;
        }

        .btn-submit:hover {
            background-color: #7a6d64;
        }

        .btn-edit {
            background-color: transparent;
            color: #8c7b6e;
            border: 1px solid #8c7b6e;
        }

        .btn-edit:hover {
            background-color: #f8f8f8;
        }
    </style>
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
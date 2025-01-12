<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate - Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            background-color: #f9f1ef;
            min-height: 100vh;
        }

        .header {
            text-align: center;
            /* ヘッダー内の文字や要素を中央揃えにする */
            padding: 20px 0;
            /* 上下に20ピクセルの余白を作る */
            border-bottom: 1px solid #eee;
            /* ヘッダーの下に薄い線（ボーダー）を作る */
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            /* 3列のグリッドを作成 */
            align-items: center;
            background: white;
        }

        .register-btn {
            padding: 8px 24px;
            border: 1px solid #d4c3bc;
            border-radius: 4px;
            background: transparent;
            color: #8b7355;
            text-decoration: none;
            font-size: 14px;
            grid-column: 3;
            /* 右の列に配置 */
            justify-self: end;
            /* 右端に寄せる */
            text-decoration: none;
            /* テキストの下線を消す */
        }

        .page-title {
            font-family: "Times New Roman", Times, serif;
        }

        .logo {
            font-family: "Times New Roman", Times, serif;
            color: #8b7355;
            font-size: 30px;
            text-decoration: none;
            font-weight: 300;
            grid-column: 2;
            /* 中央の列に配置 */
            text-align: center;
        }

        .login-btn {
            padding: 8px 24px;
            border: 1px solid #d4c3bc;
            border-radius: 4px;
            background: transparent;
            color: #8b7355;
            text-decoration: none;
            font-size: 14px;
            grid-column: 3;
            /* 右の列に配置 */
            justify-self: end;
            /* 右端に寄せる */
            text-decoration: none;
            /* テキストの下線を消す */
        }

        .login__button-submit {
            font-family: "Times New Roman", Times, serif;
            border: 1px solid rgb(150, 150, 150);
            /* 枠線を少し濃い灰色に設定 */
            background-color: rgb(240, 240, 240);
            /* 背景色を枠線より薄い灰色に設定 */
            color: #333;
            /* 文字色を濃い灰色に設定 */
            padding: 8px 24px;
            /* 内側の余白を設定 */
            font-size: 20px;
            /* 文字サイズを設定 */
            text-decoration: none;
            /* テキストの下線を消す */
        }

        /* 以下のスタイルは変更なし */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #8b7355;
            font-weight: 300;
            font-size: 28px;
            margin-bottom: 40px;
        }

        .form-card {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 24px;
            padding: 0px 100px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #f5f5f5;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group input::placeholder {
            color: #bbb;
        }

        .submit-btn {
            display: block;
            width: 120px;
            margin: 40px auto 0;
            padding: 12px;
            background-color: #8b7355;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .submit-btn:hover {
            background-color: #776244;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="/" class="logo">FashionablyLate</a>
        <div class="login__link">
            <a class="login__button-submit" href="/login">login</a>
        </div>
    </header>

    <div class="container">
        <h1 class="page-title">Register</h1>

        <div class="form-card">
            <form class="form" action="/register" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" id="name" name="name" placeholder="例) 山田 太郎" value="{{ old('name') }}">
                    @error('name') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email" placeholder="例) test@example.com" value="{{ old('email') }}">
                    @error('email') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password" placeholder="例) coachtech1106">
                    @error('password') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="submit-btn">登録</button>
            </form>
        </div>
    </div>
</body>

</html>
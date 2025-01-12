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
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            /* 3列のグリッドを作成 */
            align-items: center;
            padding: 20px 40px;
        }

        .logo {
            color: #8b7355;
            font-size: 24px;
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
    </style>
</head>

<body>
    <header class="header">
        <a href="/" class="logo">FashionablyLate</a>
        <div class="register__link">
            <a class="register__button-submit" href="/register">register</a>
        </div>
    </header>

    <div class="container">
        <h1>login</h1>

        <div class="form-card">
            <form method="POST" action="{{ route('auth.login') }}">
                @csrf
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

                <button type="submit" class="submit-btn">ログイン</button>
            </form>
        </div>
    </div>
</body>

</html>
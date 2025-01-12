<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate - Login</title>
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
</head>

<body>
    <header class="header">
        <h1 class="logo">FashionablyLate</h1>
        <div class="register__link">
            <a class="register__button-submit" href="/register">register</a>
        </div>
    </header>

    <div class="container">
        <h1 class="page-title">login</h1>

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
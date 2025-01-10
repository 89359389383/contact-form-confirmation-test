<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate - Register</title>
</head>

<body>
    <header class="header">
        <a href="/" class="logo">FashionablyLate</a>
        <button onclick="location.href='{{ route('auth.registerForm') }}';" class="login-btn">register</button>
    </header>

    <div class="container">
        <h1>Register</h1>

        <div class="form-card">
            <form method="POST" action="{{ route('login') }}">
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
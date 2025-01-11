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
        <div class="login__link">
            <a class="login__button-submit" href="/login">login</a>
        </div>
    </header>

    <div class="container">
        <h1>Register</h1>

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
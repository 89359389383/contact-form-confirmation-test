<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/contact/index.css') }}">
</head>

<body>
    <header class="header">
        <h1>FashionablyLate</h1>
    </header>

    <div class="container">
        <h2 class="section-title">Contact</h2>
        <form method="POST" action="{{ route('contact.confirm') }}">
            @csrf
            <div class="form-group">
                <label class="form-label required">お名前</label>
                <div class="form-input name-inputs">
                    <input type="text" name="first_name" placeholder="例: 山田" required>
                    @error('first_name')
                    <p class="error-message" style="color: red;">{{ $message }}</p>
                    @enderror

                    <input type="text" name="last_name" placeholder="例: 太郎" required>
                    @error('last_name')
                    <p class="error-message" style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">性別</label>
                <div class="form-input radio-group">
                    <label>
                        <input type="radio" name="gender" value="1" checked>
                        男性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="2">
                        女性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="3">
                        その他
                    </label>
                </div>
                @error('gender')
                <p class="error-message" style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label required">メールアドレス</label>
                <div class="form-input">
                    <input type="email" name="email" placeholder="例: test@example.com" required>
                    @error('email')
                    <p class="error-message" style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">電話番号</label>
                <div class="form-input tel-inputs">
                    <input type="text" name="tel_part1" placeholder="080" required>
                    <span class="tel-separator">-</span>
                    @error('tel_part1')
                    <p class="error-message" style="color: red;">{{ $message }}</p>
                    @enderror
                    <input type="text" name="tel_part2" placeholder="1234" required>
                    <span class="tel-separator">-</span>
                    @error('tel_part2')
                    <p class="error-message" style="color: red;">{{ $message }}</p>
                    @enderror
                    <input type="text" name="tel_part3" placeholder="5678" required>
                    @error('tel_part3')
                    <p class="error-message" style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">住所</label>
                <div class="form-input">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" required>
                </div>
                @error('address')
                <p class="error-message" style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">建物名</label>
                <div class="form-input">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">お問い合わせの種類</label>
                <div class="form-input">
                    <select name="category_id" required>
                        <option value="" disabled selected>選択してください</option>
                        <option value="1">商品のお届けについて</option>
                        <option value="2">商品の交換について</option>
                        <option value="3">商品トラブル</option>
                        <option value="4">ショップへのお問い合わせ</option>
                        <option value="5">その他</option>
                    </select>
                    @error('category_id')
                    <p class="error-message" style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">お問い合わせ内容</label>
                <div class="form-input">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記入ください" required></textarea>
                    @error('detail')
                    <p class="error-message" style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="submit-btn">
                <button type="submit">確認画面</button>
            </div>
        </form>
    </div>
</body>

</html>
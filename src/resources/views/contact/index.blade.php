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
        <h2>Contact</h2>
        <form method="POST" action="{{ route('contact.confirm') }}">
            @csrf

            <div class="form-group">
                <label class="form-label required">お名前</label>
                <div class="form-input name-inputs">
                    <input type="text" name="first_name" placeholder="例: 山田" value="{{ old('first_name') }}" required>
                    @error('first_name')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                    <input type="text" name="last_name" placeholder="例: 太郎" value="{{ old('last_name') }}" required>
                    @error('last_name')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">性別</label>
                <div class="form-input radio-group">
                    <label>
                        <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                        男性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
                        女性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>
                        その他
                    </label>
                    @error('gender')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">メールアドレス</label>
                <div class="form-input">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">電話番号</label>
                <div class="form-input tel-inputs">
                    <input type="text" name="tel_part1" placeholder="080" value="{{ old('tel_part1') }}" required>
                    @error('tel_part1')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                    <span class="tel-separator">-</span>
                    <input type="text" name="tel_part2" placeholder="1234" value="{{ old('tel_part2') }}" required>
                    @error('tel_part2')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                    <span class="tel-separator">-</span>
                    <input type="text" name="tel_part3" placeholder="5678" value="{{ old('tel_part3') }}" required>
                    @error('tel_part3')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">住所</label>
                <div class="form-input">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" required>
                    @error('address')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">建物名</label>
                <div class="form-input">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">お問い合わせの種類</label>
                <div class="form-input">
                    <select name="category_id" required>
                        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>選択してください</option>
                        <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>商品のお届けについて</option>
                        <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>商品の交換について</option>
                        <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>商品トラブル</option>
                        <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                        <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>その他</option>
                    </select>
                    @error('category_id')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">お問い合わせ内容</label>
                <div class="form-input">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記入ください" required>{{ old('detail') }}</textarea>
                    @error('detail')
                    <div class="error-message">{{ $message }}</div>
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
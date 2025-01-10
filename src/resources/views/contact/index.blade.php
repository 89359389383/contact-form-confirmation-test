<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - FashionablyLate</title>
</head>

<body>
    <header class="header">
        <h1>FashionablyLate</h1>
    </header>

    <div class="container">
        <h2>Contact</h2>
        <form>
            <div class="form-group">
                <label class="form-label required">お名前</label>
                <div class="form-input name-inputs">
                    <input type="text" placeholder="例: 山田" required>
                    <input type="text" placeholder="例: 太郎" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">性別</label>
                <div class="form-input radio-group">
                    <label>
                        <input type="radio" name="gender" value="male" checked>
                        男性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="female">
                        女性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="other">
                        その他
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">メールアドレス</label>
                <div class="form-input">
                    <input type="email" placeholder="例: test@example.com" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">電話番号</label>
                <div class="form-input tel-inputs">
                    <input type="text" placeholder="080" required>
                    <span class="tel-separator">-</span>
                    <input type="text" placeholder="1234" required>
                    <span class="tel-separator">-</span>
                    <input type="text" placeholder="5678" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">住所</label>
                <div class="form-input">
                    <input type="text" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">建物名</label>
                <div class="form-input">
                    <input type="text" placeholder="例: 千駄ヶ谷マンション101">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">お問い合わせの種類</label>
                <div class="form-input">
                    <select required>
                        <option value="" disabled selected>選択してください</option>
                        <option value="general">一般的なお問い合わせ</option>
                        <option value="business">ビジネスに関するお問い合わせ</option>
                        <option value="other">その他</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">お問い合わせ内容</label>
                <div class="form-input">
                    <textarea placeholder="お問い合わせ内容をご記入ください" required></textarea>
                </div>
            </div>

            <div class="submit-btn">
                <button type="submit">確認画面</button>
            </div>
        </form>
    </div>
</body>

</html>
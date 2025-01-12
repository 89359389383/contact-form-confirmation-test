<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - FashionablyLate</title>
    <style>
        .min-h-screen {
            min-height: 100vh;
        }

        .flex {
            display: flex;
        }

        .flex-col {
            flex-direction: column;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .relative {
            position: relative;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .absolute {
            position: absolute;
        }

        .inset-0 {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .text-large {
            font-size: 20vw;
            /* 修正: クラス名に識別子として有効な名前を使用 */
        }

        .font-bold {
            font-weight: 700;
        }

        .text-gray-50 {
            color: #FAFAFA;
        }

        .select-none {
            user-select: none;
        }

        .pointer-events-none {
            pointer-events: none;
        }

        .text-center {
            text-align: center;
        }

        .z-10 {
            z-index: 10;
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }

        .md-text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .text-gray-700 {
            color: #4A5568;
        }

        .mb-8 {
            margin-bottom: 2rem;
        }

        .inline-block {
            display: inline-block;
        }

        .px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .bg-brown {
            background-color: #8B7E75;
            /* 修正: クラス名を有効な識別子に変更 */
        }

        .text-white {
            color: white;
        }

        .hover-bg-brown:hover {
            background-color: #7A6E66;
            /* 修正: クラス名を有効な識別子に変更 */
        }

        .transition-colors {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
            transition-duration: 150ms;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        .duration-200 {
            transition-duration: 200ms;
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Helvetica Neue", Arial, "Hiragino Kaku Gothic ProN", "Hiragino Sans", Meiryo, sans-serif;
            color: #555;
            line-height: 1.6;
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

        .header h1 {
            color: #987;
            font-weight: normal;
            font-size: 30px;
            font-family: "Times New Roman", Times, serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .section-title {
            font-family: "Times New Roman", Times, serif;
            font-size: 30px;
        }

        h2 {
            color: #987;
            text-align: center;
            font-weight: normal;
            margin-bottom: 40px;
            font-size: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
        }

        .form-label {
            width: 200px;
            padding-top: 8px;
        }

        .required::after {
            content: "※";
            color: #d88;
            margin-left: 5px;
        }

        .form-input {
            flex: 1;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            font-size: 16px;
        }

        .name-inputs {
            display: flex;
            gap: 20px;
        }

        .name-inputs input {
            width: 100%;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            padding-top: 8px;
        }

        .radio-group label {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .tel-inputs {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .tel-inputs input {
            width: 100px;
        }

        .tel-separator {
            color: #999;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        .submit-btn {
            text-align: center;
            margin-top: 40px;
        }

        .submit-btn button {
            background-color: #987;
            color: white;
            border: none;
            padding: 10px 40px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn button:hover {
            background-color: #876;
        }
    </style>
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
                <div cla<ss="form-input radio-group">
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
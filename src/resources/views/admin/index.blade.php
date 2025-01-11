<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate - Admin</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: white;
            color: #333;
        }

        /* Layout */
        .min-h-screen {
            min-height: 100vh;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            border-bottom: 1px solid #E5E5E5;
        }

        h1 {
            color: #8B7355;
            font-size: 1.5rem;
        }

        /* Main content */
        main {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        h2 {
            color: #8B7355;
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        /* Search filters */
        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        input[type="text"],
        input[type="date"],
        select {
            padding: 0.5rem;
            border: 1px solid #E5E5E5;
            border-radius: 0.25rem;
        }

        input[type="text"] {
            flex: 1;
            min-width: 300px;
        }

        select {
            min-width: 120px;
        }

        select.inquiry-type {
            min-width: 200px;
        }

        /* Buttons */
        .btn {
            padding: 0.5rem 1.5rem;
            border-radius: 0.25rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-primary {
            background: #8B7355;
            color: white;
        }

        .btn-primary:hover {
            background: #7A6548;
        }

        .btn-secondary {
            background: #D2B48C;
            color: white;
        }

        .btn-secondary:hover {
            background: #C1A47B;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid #8B7355;
            color: #8B7355;
        }

        .btn-outline:hover {
            background: #8B7355;
            color: white;
        }

        .btn-export {
            background: #F5F5F5;
            padding: 0.25rem 1rem;
            margin-bottom: 1rem;
        }

        .btn-export:hover {
            background: #E8E8E8;
        }

        /* Table */
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #8B7355;
            color: white;
            text-align: left;
            padding: 0.75rem;
        }

        td {
            padding: 0.75rem;
            border-bottom: 1px solid #E5E5E5;
        }

        tr:hover {
            background: #F9F9F9;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }

        .pagination button {
            padding: 0.5rem;
            border: 1px solid #E5E5E5;
            border-radius: 0.25rem;
            min-width: 2.5rem;
            cursor: pointer;
        }

        .pagination button:hover {
            background: #F5F5F5;
        }

        .pagination button.active {
            background: #8B7355;
            color: white;
            border-color: #8B7355;
        }
    </style>
</head>

<body>
    <div class="min-h-screen">
        <header>
            <h1>FashionablyLate</h1>
            <button class="btn btn-outline">logout</button>
        </header>

        <main>
            <h2>Admin</h2>

            <form class="filters" action="{{ route('admin.index') }}" method="get">
                <!-- 名前やメールアドレスの入力欄 -->
                <input type="text"
                    name="nameemail"
                    placeholder="名前やメールアドレスを入力してください"
                    value="{{ request('nameemail') }}">

                <!-- 性別を選択するためのドロップダウンメニュー -->
                <select name="gender">
                    <option value="">性別</option> <!-- 初期状態で空欄を表示 -->
                    <option value="">全て</option> <!-- 全てを選択すると性別の条件を無視 -->
                    <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option> <!-- 男性が選択された場合に保持 -->
                    <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option> <!-- 女性が選択された場合に保持 -->
                    <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option> <!-- その他が選択された場合に保持 -->
                </select>

                <!-- お問い合わせの種類を選択するためのドロップダウンメニュー -->
                <select name="category_id">
                    <option value="">お問い合わせ種類</option> <!-- 初期状態で空欄を表示 -->
                    @foreach ($categories as $category)
                    <!-- お問い合わせ種類の一覧をループで表示 -->
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->content }} <!-- 種類の名前を表示 -->
                    </option>
                    @endforeach
                </select>

                <!-- 日付の検索範囲の開始日を入力するための日付選択欄 -->
                <input type="date"
                    name="date_from"
                    value="{{ request('date_from') }}">

                <!-- 日付の検索範囲の終了日を入力するための日付選択欄 -->
                <input type="date"
                    name="date_to"
                    value="{{ request('date_to') }}">

                <!-- 検索ボタン -->
                <button type="submit"
                    class="btn btn-primary">検索</button>

                <!-- 検索条件をリセットして初期状態に戻すためのリンク -->
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">リセット</a>
            </form>

            <button class="btn btn-export">エクスポート</button>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>お名前</th>
                            <th>性別</th>
                            <th>メールアドレス</th>
                            <th>お問い合わせの種類</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact) <!-- contactsテーブルのデータを1件ずつループ処理 -->
                        <tr>
                            <!-- 名前（姓と名を結合して表示） -->
                            <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>

                            <!-- 性別を表示 -->
                            <td>
                                @if ($contact->gender == 1)
                                男性
                                @elseif ($contact->gender == 2)
                                女性
                                @elseif ($contact->gender == 3)
                                その他
                                @else
                                未設定
                                @endif
                            </td>

                            <!-- メールアドレスを表示 -->
                            <td>{{ $contact->email }}</td>

                            <!-- お問い合わせの種類を表示 -->
                            <td>{{ $contact->category->content }}</td>

                            <!-- 詳細ボタン -->
                            <td>
                                <button class="btn btn-outline">詳細</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $contacts->links() }}
            </div>
        </main>
    </div>
</body>

</html>
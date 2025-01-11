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

            <div class="filters">
                <input type="text" placeholder="名前やメールアドレスを入力してください">
                <select>
                    <option value="">性別</option>
                    <option value="male">男性</option>
                    <option value="female">女性</option>
                </select>
                <select class="inquiry-type">
                    <option value="">お問い合わせの種類</option>
                    <option value="exchange">商品の交換について</option>
                </select>
                <input type="date">
                <button class="btn btn-primary">検索</button>
                <button class="btn btn-secondary">リセット</button>
            </div>

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
                        <tr>
                            <td>山田 太郎</td>
                            <td>男性</td>
                            <td>test@example.com</td>
                            <td>商品の交換について</td>
                            <td>
                                <button class="btn btn-outline">詳細</button>
                            </td>
                        </tr>
                        <tr>
                            <td>山田 太郎</td>
                            <td>男性</td>
                            <td>test@example.com</td>
                            <td>商品の交換について</td>
                            <td>
                                <button class="btn btn-outline">詳細</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                <button>&lt;</button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>4</button>
                <button>5</button>
                <button>&gt;</button>
            </div>
        </main>
    </div>
</body>

</html>
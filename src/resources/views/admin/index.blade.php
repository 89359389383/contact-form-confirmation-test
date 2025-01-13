<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
</head>

<body>
    <div class="min-h-screen">
        <header class="header">
            <h1 class="logo">FashionablyLate</h1>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf <!-- CSRFトークンを追加 -->
                <button type="submit" class="logout-btn-outline">logout</button>
            </form>
        </header>

        <main>
            <h2 class="section-title">Admin</h2>

            <form class="filters" action="{{ route('admin.index') }}" method="get">
                <!-- 名前やメールアドレスの入力欄 -->
                <input type="text"
                    name="nameemail"
                    placeholder="名前やメールアドレスを入力してください"
                    value="{{ request('nameemail') }}">

                <!-- 性別を選択するためのドロップダウンメニュー -->
                <select name="gender" class="filter-select gender-select">
                    <option value="">性別</option> <!-- 初期状態で空欄を表示 -->
                    <option value="">全て</option> <!-- 全てを選択すると性別の条件を無視 -->
                    <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                </select>

                <!-- お問い合わせの種類を選択するためのドロップダウンメニュー -->
                <select name="category_id" class="filter-select category-select">
                    <option value="">お問い合わせの種類</option> <!-- 初期状態で空欄を表示 -->
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->content }}
                    </option>
                    @endforeach
                </select>

                <!-- 日付の検索範囲の開始日を入力するための日付選択欄 -->
                <input type="date" name="date_from" value="{{ request('date_from') }}" class="filter-date date-from">

                <!-- 日付の検索範囲の終了日を入力するための日付選択欄 -->
                <input type="date" name="date_to" value="{{ request('date_to') }}" class="filter-date date-to">

                <!-- 検索ボタン -->
                <button type="submit"
                    class="btn btn-primary">検索</button>

                <!-- 検索条件をリセットして初期状態に戻すためのリンク -->
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">リセット</a>
            </form>

            <form action="{{ route('admin.export') }}" method="get">
                <input type="hidden" name="nameemail" value="{{ request('nameemail') }}">
                <input type="hidden" name="gender" value="{{ request('gender') }}">
                <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                <input type="hidden" name="date_from" value="{{ request('date_from') }}">
                <input type="hidden" name="date_to" value="{{ request('date_to') }}">
                <div class="export-pagination-wrapper">
                    <form action="{{ route('admin.export') }}" method="get">
                        <button type="submit" class="btn btn-export">エクスポート</button>
                    </form>
                    <div class="pagination">
                        {{ $contacts->links('vendor.pagination.default') }}
                    </div>
                </div>
            </form>

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
                        @foreach ($contacts as $contact)
                        <tr data-id="{{ $contact->id }}"
                            data-phone="{{ $contact->tel }}"
                            data-address="{{ $contact->address }}"
                            data-building="{{ $contact->building }}"
                            data-content="{{ $contact->detail }}">
                            <td class="name">{{ $contact->first_name }} {{ $contact->last_name }}</td>
                            <td class="gender">
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
                            <td class="email">{{ $contact->email }}</td>
                            <td class="category">{{ $contact->category->content }}</td>
                            <td><button class="btn btn-outline">詳細</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- モーダルウィンドウ -->
            <div id="detailModal" class="modal" style="display: none;">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p><strong>お名前:</strong> <span id="modalName"></span></p>
                    <p><strong>性別:</strong> <span id="modalGender"></span></p>
                    <p><strong>メールアドレス:</strong> <span id="modalEmail"></span></p>
                    <p><strong>電話番号:</strong> <span id="modalPhone"></span></p>
                    <p><strong>住所:</strong> <span id="modalAddress"></span></p>
                    <p><strong>建物名:</strong> <span id="modalBuilding"></span></p>
                    <p><strong>お問い合わせの種類:</strong> <span id="modalCategory"></span></p>
                    <p><strong>お問い合わせ内容:</strong> <span id="modalContent"></span></p>
                    <!-- 削除フォーム -->
                    <form action="{{ url('/admin/contacts/' . $contact->id) }}" method="POST" class="delete-form">
                        @method('DELETE') <!-- HTTPメソッドの指定 -->
                        @csrf <!-- CSRF保護 -->
                        <input type="hidden" name="id" value="{{ $contact->id }}"> <!-- 必要なら追加 -->
                        <button type="submit" class="deleteButton">削除</button>
                    </form>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modal = document.getElementById('detailModal');
                    const closeButton = document.querySelector('.close');
                    const deleteButton = document.getElementById('deleteButton');

                    document.querySelectorAll('.btn-outline').forEach(button => {
                        button.addEventListener('click', function() {
                            const row = this.closest('tr');
                            modal.style.display = 'flex';
                            document.getElementById('modalName').innerText = row.querySelector('.name').innerText;
                            document.getElementById('modalGender').innerText = row.querySelector('.gender').innerText;
                            document.getElementById('modalEmail').innerText = row.querySelector('.email').innerText;
                            document.getElementById('modalPhone').innerText = row.dataset.phone || '未登録';
                            document.getElementById('modalAddress').innerText = row.dataset.address || '未登録';
                            document.getElementById('modalBuilding').innerText = row.dataset.building || '未登録';
                            document.getElementById('modalCategory').innerText = row.querySelector('.category').innerText;
                            document.getElementById('modalContent').innerText = row.dataset.content || '未登録';
                            deleteButton.dataset.id = row.dataset.id;
                        });
                    });

                    closeButton.addEventListener('click', function() {
                        modal.style.display = 'none';
                    });

                    deleteButton.addEventListener('click', function() {
                        const id = this.dataset.id;
                        if (confirm('本当に削除しますか？')) {
                            fetch(`/admin/contacts/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                }
                            }).then(response => {
                                if (response.ok) {
                                    alert('削除が完了しました');
                                    location.reload();
                                } else {
                                    alert('削除に失敗しました');
                                }
                            });
                        }
                    });
                });
            </script>
        </main>
    </div>
</body>

</html>
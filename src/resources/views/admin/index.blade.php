<div class="min-h-screen bg-white">
    <!-- Header -->
    <header class="flex justify-between items-center px-8 py-4 border-b">
        <h1 class="text-2xl text-[#8B7355]">FashionablyLate</h1>
        <button class="px-4 py-1 text-[#8B7355] border border-[#8B7355] rounded hover:bg-[#8B7355] hover:text-white transition-colors">
            logout
        </button>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        <h2 class="text-xl text-[#8B7355] mb-8">Admin</h2>

        <!-- Search Filters -->
        <div class="flex flex-wrap gap-4 mb-6">
            <input
                type="text"
                placeholder="名前やメールアドレスを入力してください"
                class="flex-1 min-w-[300px] p-2 border rounded" />
            <select class="p-2 border rounded min-w-[120px]">
                <option value="">性別</option>
                <option value="male">男性</option>
                <option value="female">女性</option>
            </select>
            <select class="p-2 border rounded min-w-[200px]">
                <option value="">お問い合わせの種類</option>
                <option value="exchange">商品の交換について</option>
            </select>
            <input
                type="date"
                class="p-2 border rounded" />
            <button class="px-6 py-2 bg-[#8B7355] text-white rounded hover:bg-[#7A6548]">
                検索
            </button>
            <button class="px-6 py-2 bg-[#D2B48C] text-white rounded hover:bg-[#C1A47B]">
                リセット
            </button>
        </div>

        <!-- Export Button -->
        <button class="mb-4 px-4 py-1 bg-[#F5F5F5] rounded hover:bg-[#E8E8E8]">
            エクスポート
        </button>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-[#8B7355] text-white">
                        <th class="p-3 text-left">お名前</th>
                        <th class="p-3 text-left">性別</th>
                        <th class="p-3 text-left">メールアドレス</th>
                        <th class="p-3 text-left">お問い合わせの種類</th>
                        <th class="p-3"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">山田 太郎</td>
                        <td class="p-3">男性</td>
                        <td class="p-3">test@example.com</td>
                        <td class="p-3">商品の交換について</td>
                        <td class="p-3">
                            <button class="px-4 py-1 text-[#8B7355] border border-[#8B7355] rounded hover:bg-[#8B7355] hover:text-white transition-colors">
                                詳細
                            </button>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">山田 太郎</td>
                        <td class="p-3">男性</td>
                        <td class="p-3">test@example.com</td>
                        <td class="p-3">商品の交換について</td>
                        <td class="p-3">
                            <button class="px-4 py-1 text-[#8B7355] border border-[#8B7355] rounded hover:bg-[#8B7355] hover:text-white transition-colors">
                                詳細
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center gap-2 mt-6">
            <button class="p-2 border rounded hover:bg-gray-50">{'<'}< /button>
                    <button class="p-2 border rounded bg-[#8B7355] text-white">1</button>
                    <button class="p-2 border rounded hover:bg-gray-50">2</button>
                    <button class="p-2 border rounded hover:bg-gray-50">3</button>
                    <button class="p-2 border rounded hover:bg-gray-50">4</button>
                    <button class="p-2 border rounded hover:bg-gray-50">5</button>
                    <button class="p-2 border rounded hover:bg-gray-50">{'>'}</button>
        </div>
    </main>
</div>
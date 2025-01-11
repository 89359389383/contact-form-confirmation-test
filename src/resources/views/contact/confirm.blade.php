<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/confirm/index.css') }}">
</head>

<div class="min-h-screen bg-white py-8 px-4">
    <div class="max-w-3xl mx-auto space-y-8">
        <header class="text-center space-y-4">
            <h1 class="text-3xl font-light text-[#8B7E75]">FashionablyLate</h1>
            <h2 class="text-2xl font-light text-[#8B7E75]">Confirm</h2>
        </header>

        <div class="border border-[#D4C5BB] rounded-sm overflow-hidden">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <dl class="divide-y divide-[#D4C5BB]">
                    <div class="grid grid-cols-3">
                        <dt class="bg-[#C5B8B2] p-4 text-white">お名前</dt>
                        <dd class="col-span-2 p-4">
                            <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly class="w-full">
                            <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly class="w-full">
                        </dd>
                    </div>

                    <div class="grid grid-cols-3">
                        <dt class="bg-[#C5B8B2] p-4 text-white">性別</dt>
                        <dd class="col-span-2 p-4">
                            <input type="text" name="gender" value="{{ $contact['gender'] === 1 ? '男性' : ($contact['gender'] === 2 ? '女性' : 'その他') }}" readonly class="w-full">
                        </dd>
                    </div>

                    <div class="grid grid-cols-3">
                        <dt class="bg-[#C5B8B2] p-4 text-white">メールアドレス</dt>
                        <dd class="col-span-2 p-4">
                            <input type="email" name="email" value="{{ $contact['email'] }}" readonly class="w-full">
                        </dd>
                    </div>

                    <div class="grid grid-cols-3">
                        <dt class="bg-[#C5B8B2] p-4 text-white">電話番号</dt>
                        <dd class="col-span-2 p-4">
                            <input type="text" name="tel" value="{{ $contact['tel'] }}" readonly class="w-full">
                        </dd>
                    </div>

                    <div class="grid grid-cols-3">
                        <dt class="bg-[#C5B8B2] p-4 text-white">住所</dt>
                        <dd class="col-span-2 p-4">
                            <input type="text" name="address" value="{{ $contact['address'] }}" readonly class="w-full">
                        </dd>
                    </div>

                    <div class="grid grid-cols-3">
                        <dt class="bg-[#C5B8B2] p-4 text-white">建物名</dt>
                        <dd class="col-span-2 p-4">
                            <input type="text" name="building" value="{{ $contact['building'] }}" readonly class="w-full">
                        </dd>
                    </div>

                    <div class="grid grid-cols-3">
                        <dt class="bg-[#C5B8B2] p-4 text-white">お問い合わせの種類</dt>
                        <dd class="col-span-2 p-4">
                            <input type="text" name="category_id" value="{{ ['商品のお届けについて', '商品の交換について', '商品トラブル', 'ショップへのお問い合わせ', 'その他'][$contact['category_id'] - 1] }}" readonly class="w-full">
                        </dd>
                    </div>

                    <div class="grid grid-cols-3">
                        <dt class="bg-[#C5B8B2] p-4 text-white">お問い合わせ内容</dt>
                        <dd class="col-span-2 p-4">
                            <textarea name="detail" readonly class="w-full">{{ $contact['detail'] }}</textarea>
                        </dd>
                    </div>
                </dl>

                <div class="flex justify-center gap-4 mt-6">
                    <button type="submit" class="bg-[#8B7E75] text-white px-8 py-2 rounded hover:bg-[#7A6D64] transition-colors">
                        送信
                    </button>
                </div>
            </form>

            <form action="{{ route('contact.index') }}" method="GET" class="flex justify-center gap-4 mt-4">
                <button type="submit" class="bg-white text-[#8B7E75] px-8 py-2 rounded border border-[#8B7E75] hover:bg-gray-50 transition-colors">
                    修正
                </button>
            </form>
        </div>
    </div>
</div>
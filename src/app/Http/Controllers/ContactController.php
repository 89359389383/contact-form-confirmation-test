<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Contactモデルを使用
use App\Http\Requests\ContactRequest; // バリデーション用リクエストを使用

class ContactController extends Controller
{
    /**
     * 入力フォーム表示
     */
    public function index(Request $request)
    {
        // セッションから以前の入力値を取得
        $contact = $request->session()->get('contact', []);
        return view('contact.index', compact('contact'));
    }

    /**
     * 確認画面表示
     */
    public function confirm(ContactRequest $request)
    {
        // 電話番号を結合
        $phone = $request->tel_part1 . $request->tel_part2 . $request->tel_part3;

        // 必要なデータだけを取得して電話番号を追加
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'detail', 'category_id']);
        $contact['tel'] = $phone;

        // 入力内容をセッションに保存
        $request->session()->put('contact', $contact);

        // 確認画面にデータを渡す
        return view('contact.confirm', compact('contact'));
    }

    /**
     * 問い合わせデータを保存してサンクスページへ
     */
    public function store(Request $request)
    {
        // セッションからデータを取得
        $contact = $request->session()->get('contact');

        // データを保存
        Contact::create($contact);

        // セッションデータを削除
        $request->session()->forget('contact');

        // サンクスページを表示
        return view('contact.thanks');
    }
}

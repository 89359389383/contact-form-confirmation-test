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
    public function index()
    {
        return view('contact.index');
    }

    /**
     * 確認画面表示
     */
    public function confirm(ContactRequest $request)
    {
        // 必要なデータだけを取得
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);

        // 確認画面にデータを渡す
        return view('contact.confirm', ['contact' => $contact]);
    }

    /**
     * 問い合わせデータを保存してサンクスページへ
     */
    public function store(ContactRequest $request)
    {
        // 必要なデータだけを取得して保存
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);
        Contact::create($contact);

        // サンクスページを表示
        return view('contact.thanks');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Userモデルを使用
use Illuminate\Support\Facades\Hash; // パスワードハッシュ化に使用
use Illuminate\Support\Facades\Auth; // 認証に使用
use App\Http\Requests\AuthRequest; // バリデーション用リクエストを使用

class AuthController extends Controller
{
    /**
     * ユーザー登録フォームを表示
     */
    public function registerForm()
    {
        return view('auth.register'); // 登録ページのビューを返す
    }

    /**
     * ユーザー登録処理
     */
    public function register(AuthRequest $request)
    {
        // 必要なデータを抽出
        $userData = $request->only(['name', 'email', 'password']);

        // ユーザーを作成
        User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']), // パスワードをハッシュ化
        ]);

        // ログインページへリダイレクト
        return redirect()->route('auth.loginForm');
    }

    /**
     * ログインフォームを表示
     */
    public function loginForm()
    {
        return view('auth.login'); // ログインページのビューを返す
    }

    /**
     * ログイン処理
     */
    public function login(AuthRequest $request)
    {
        // 必要なデータを抽出
        $credentials = $request->only(['email', 'password']);

        // 認証情報を試す
        if (Auth::attempt($credentials)) {
            // 管理画面へリダイレクト
            return redirect()->route('admin.index');
        }

        // 認証失敗時は再度ログインフォームを表示
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ])->withInput();
    }
}

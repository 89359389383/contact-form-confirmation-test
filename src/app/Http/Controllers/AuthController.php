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
        // 入力データを検証 (AuthRequest を使用)
        $userData = $request->only(['name', 'email', 'password']);

        // ユーザーを作成
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']), // パスワードをハッシュ化
        ]);

        // ログイン状態にする
        Auth::login($user);

        // ログインページまたは管理画面へリダイレクト
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
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.index');
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ])->withInput();
    }
}

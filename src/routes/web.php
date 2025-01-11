<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ユーザー登録フォームを表示するルート
Route::get('/register', [AuthController::class, 'registerForm'])->name('auth.registerForm');

// ユーザー登録を処理するルート (フォーム送信先)
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

// ログインフォームを表示するルート
Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');

// ログインを処理するルート (フォーム送信先)
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// お問い合わせフォーム関連
Route::get('/', [ContactController::class, 'index'])->name('contact.index'); // 入力ページ
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm'); // 確認ページ
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
// 保存＆サンクスページ

// 管理画面関連（認証が必要）
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index'); // 管理画面
});
Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
Route::get('/admin/contacts/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::delete('/admin/contacts/{id}', [AdminController::class, 'destroy']);

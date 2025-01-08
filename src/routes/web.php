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

// お問い合わせフォーム関連
Route::get('/', [ContactController::class, 'index'])->name('contact.index'); // 入力ページ
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm'); // 確認ページ
Route::post('/thanks', [ContactController::class, 'store'])->name('contact.store'); // サンクスページ

// 管理画面関連
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index'); // 管理画面

// ユーザー登録関連
Route::get('/register', [AuthController::class, 'registerForm'])->name('auth.registerForm'); // 登録フォーム
Route::post('/register', [AuthController::class, 'register'])->name('auth.register'); // 登録処理

// ログイン関連
Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm'); // ログインフォーム
Route::post('/login', [AuthController::class, 'login'])->name('auth.login'); // ログイン処理
